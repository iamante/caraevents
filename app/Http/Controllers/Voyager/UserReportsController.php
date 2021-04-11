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

        // $dates = Auth::user()->actions->where('log_name','Login')->groupBy(function($date) {
        //     return Carbon::parse($date->created_at)->format('Y-m-d');
        // });
        
        $date = Auth::user()->actions->where('log_name','Login')->where('created_at', '>=', Carbon::today())->count();

        $userAdded = User::where('created_at','>=',Carbon::today())->count();
            // dd($date);
        // $date = count($dates[$today]);

        $weekUser = Auth::user()->actions->where('log_name','Login')->where('created_at', '>=', Carbon::today()->subDays(7))->count();

        $monthUser = Auth::user()->actions->where('log_name','Login')->where('created_at', '>=', Carbon::today()->subDays(30))->count();

        return view('/vendor/voyager/user-reports/browse')->with([
            // 'dates' => $dates,
            'userAdded' => $userAdded,
            'date' => $date,
            'weekUser' => $weekUser,
            'monthUser' => $monthUser,
        ]);
    }
}
