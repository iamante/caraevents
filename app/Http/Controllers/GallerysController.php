<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GallerysController extends Controller
{
    public function index() {
        $title = 'Gallery';
        $gallery = Gallery::all();
        return view('pages.gallery')->with(['title' => $title, 'gallery' => $gallery]);
    }

}
