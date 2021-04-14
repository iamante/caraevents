<?php

namespace App\Http\Controllers\Voyager;

use App\User;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadImagesDeleted;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use Spatie\Activitylog\Models\Activity;

class UserReportsController extends VoyagerBaseController
{
    use BreadRelationshipParser;

    //***************************************
    //               ____
    //              |  _ \
    //              | |_) |
    //              |  _ <
    //              | |_) |
    //              |____/
    //
    //      Browse our Data Type (B)READ
    //
    //****************************************

    public function index(Request $request)
    {
        $today = Carbon::today()->format('Y-m-d');
        
        $todayDateLogin = Activity::where('log_name','Login')->where('created_at', '>=', Carbon::today())->get();
        $todayDate = $todayDateLogin->unique('properties')->count();


        $userAdded = User::where('created_at','>=', Carbon::today())->count();

        $weekUserLogin = Activity::where('log_name','Login')->where('created_at', '>=', Carbon::today()->subDays(7))->get();
        $weekUser = $weekUserLogin->unique('properties')->count();

        $monthUserLogin = Activity::where('log_name','Login')->where('created_at', '>=', Carbon::today()->subDays(30))->get();
        $monthUser = $monthUserLogin->unique('properties')->count();
        
        $user = User::select(DB::raw('count(name) as count'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
            DB::raw("DATE_FORMAT(created_at,'%m') as monthKey"))->groupBy('months', 'monthKey')
            ->orderBy('created_at', 'ASC')
            ->get();

        $totalUser = [0,0,0,0,0,0,0,0,0,0,0,0];

        foreach($user as $date){
            $totalUser[$date->monthKey-1] = $date->count;
        }

        $lastUserLogin = Activity::where('log_name','Login')->take(3)->get();
        $lastUserLoginUnique = $lastUserLogin->unique('properties');

        $userNotLogin = Activity::where('log_name','Login')->where('created_at', '<', Carbon::today()->subDays(30))->take(3)->get();
        $userNotLoginForMonth = $userNotLogin->unique('properties');


        return view('/vendor/voyager/user-reports/browse')->with([
            'userNotLoginForMonth' => $userNotLoginForMonth,
            'lastUserLoginUnique' => $lastUserLoginUnique,
            'todayDate' => $todayDate,
            'totalUser' => $totalUser,
            'userAdded' => $userAdded,
            'weekUser' => $weekUser,
            'monthUser' => $monthUser,
        ]);
    }
}
