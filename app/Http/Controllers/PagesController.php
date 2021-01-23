<?php

namespace App\Http\Controllers;

use App\Rental;
use App\Gallery;
use App\Service;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $services = Service::latest()->take(1)->get();
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
}
