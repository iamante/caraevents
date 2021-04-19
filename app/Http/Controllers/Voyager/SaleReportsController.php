<?php

namespace App\Http\Controllers\Voyager;

use App\User;
use Exception;
use Carbon\Carbon;
use App\Reservation;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Events\BreadDataAdded;
use Spatie\Activitylog\Models\Activity;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadImagesDeleted;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

class SaleReportsController extends VoyagerBaseController
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
        $totalRevenue = Reservation::where('status',1)->sum('price');

        $totalRevenueForToday = Reservation::where('status',1)->whereDate('updated_at', Carbon::today())->sum('price');

        $totalRevenueForWeek = Reservation::where('status',1)->whereDate('updated_at','>=', Carbon::today()->subDays(7))->sum('price');

        $totalDecline = Reservation::onlyTrashed()->count();

        $totalDeclines = Reservation::onlyTrashed()->sum('price');

        $reservation = Reservation::where('status', 1)->get(['id','name','date','start_time','end_time','customer_name','customer_lname','location','status','price']);
        $price = Reservation::where('status',1)->select(DB::raw('sum(price) as sums'), 
            DB::raw("DATE_FORMAT(date,'%M %Y') as months"),
            DB::raw("DATE_FORMAT(date,'%m') as monthKey"))->groupBy('months', 'monthKey')
            ->orderBy('created_at', 'ASC')
            ->get();
        
        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($price as $order){
            $data[$order->monthKey-1] = $order->sums;
        }

        return view('/vendor/voyager/sales-reports/browse')->with([
            'reservation' => $reservation,
            'data' => $data,
            'totalRevenueForToday' => $totalRevenueForToday,
            'totalRevenueForWeek' => $totalRevenueForWeek,
            'totalRevenue' => $totalRevenue,
            'totalDecline' => $totalDecline,
            'totalDeclines' => $totalDeclines,
        ]);
    }
}
