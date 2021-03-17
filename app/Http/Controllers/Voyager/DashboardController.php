<?php 
namespace App\Http\Controllers\Voyager;

use App\Service;
use Carbon\Carbon;
use App\Reservation;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class DashboardController extends VoyagerBaseController
{
    public function index(Request $request)
    {
        $count = array("daily" => 0, "weekly" => 0, "monthly" => 0);
        $count['daily'] = Reservation::where('created_at','>=',Carbon::today())->count();
        $count['weekly'] = Reservation::where('created_at','>=',Carbon::today()->subDays(7))->orderByDesc('created_at')->limit(10)->get();
        $count['monthly'] = Reservation::where('created_at','>=',Carbon::today()->subDays(30))->count();
        $reservation = Reservation::get(['id','name','date','start_time','end_time']);

        return Voyager::view('voyager::index')->with(['count' => $count['weekly'], 'reservation' => $reservation]);
    }
}


?>