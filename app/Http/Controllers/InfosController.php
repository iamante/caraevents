<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfosController extends Controller
{
    public function index() {
        return view('pages.infos');
    }
}
