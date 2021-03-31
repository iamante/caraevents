<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarRentalsController extends Controller
{
    public function index()
    {
        return view('pages.car-rental');
    }
}
