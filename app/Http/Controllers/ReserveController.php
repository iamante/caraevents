<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  string
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.reservation');
    }
}
