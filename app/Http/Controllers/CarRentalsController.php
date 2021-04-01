<?php

namespace App\Http\Controllers;

use App\CarRental;
use Illuminate\Http\Request;

class CarRentalsController extends Controller
{
    public function index()
    {
        $car_rental = CarRental::paginate(9);

        return view('pages.car-rental')->with('car_rental', $car_rental );
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */

    public function show($slug)
    {
        $car_rental = CarRental::where('slug', $slug)->firstOrFail();
        return view('pages.car')->with([
            'car_rental' => $car_rental, 
            ]);
    }
}
