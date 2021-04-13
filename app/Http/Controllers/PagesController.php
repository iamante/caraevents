<?php

namespace App\Http\Controllers;

use App\User;
use App\Rental;
use App\Gallery;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class PagesController extends Controller
{
    public function index() {
        $services = Service::latest()->take(4)->get();
        $servicesSecondRow = Service::skip(1)->take(2)->get();
        $servicesThirdRow = Service::skip(3)->take(2)->get();

        return view('pages.index')->with(['services' => $services, 'servicesSecondRow' => $servicesSecondRow, 'servicesThirdRow' => $servicesThirdRow]);
    }
    
    public function about() {
        $title = 'About Us';

        return view('pages.about')->with('title',$title);
    }

    public function blog() {
        $title = 'Blog';
        return view('pages.blog')->with('title',$title);
    }

    public function contact() {
        $title = 'Contact';
        return view('pages.contact')->with('title',$title);
    }

    public function profile() {
        return view('pages.user-profile');
    }

    public function termsconditions() {
        // $title = 'Terms and Conditions';
        return view('pages.termsconditions');
    }

    public function privacypolicy() {
        return view('pages.privacypolicy');
    }


}
