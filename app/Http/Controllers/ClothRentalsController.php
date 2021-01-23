<?php

namespace App\Http\Controllers;

use App\ClothRental;
use Illuminate\Http\Request;

class ClothRentalsController extends Controller
{
    public function index() {
        $title = 'Clothing';
        $rentals = ClothRental::all();
        return view('pages.clothing')->with(['rentals' => $rentals, 'title' => $title]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $title = 'Cloth';
        $rentals = ClothRental::where('slug', $slug)->firstOrFail();
        return view('pages.cloth')->with(['rentals' => $rentals, 'title' => $title]);
    }
}
