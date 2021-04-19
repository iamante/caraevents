<?php

namespace App\Http\Controllers;

use App\Service;
use App\CarRental;
use App\Reservation;
use App\ReservationService;
use Illuminate\Http\Request;
use App\CarRentalReservation;
use App\Mail\ReservationPlaced;
use Illuminate\Support\Facades\Mail;

class ReservationsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $slug)
    {
        $title = 'Reservation';
        $menu = $request->input('menu');
        $location = $request->input('location');
        $service = Service::where('slug', $slug)->firstOrFail();
        $reservations = Reservation::all()->pluck('date');
        return view('pages.reservation')->with([
            'service' => $service, 
            'reservation' => $reservations, 
            'title' => $title,
            'menu' => $menu,
            'location' => $location,
            ]);
    }

    /**
     * Display a listing of the resource.
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function car_index(Request $request ,$slug)
    {
        
        $car_rental = CarRental::where('slug', $slug)->firstOrFail();
        
        return view('pages.car_reservation')->with('car_rental' , $car_rental);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $reserve = Reservation::create([
           'user_id' => auth()->user() ? auth()->user()->id : null,
           'customer_name' => $request->input('customer_name'),
           'customer_lname' => $request->input('customer_lname'),
           'email' => $request->input('email'),
           'phone' => $request->input('phone'),
           'address' => $request->input('address'),
           'barangay' => $request->input('barangay'),
           'city' => $request->input('city'), 
           'province' => $request->input('province'), 
           'postal' => $request->input('postal'), 
           'name' => $request->input('name'), 
           'details' => $request->input('details'),
           'guests' => $request->input('guests'), 
           'menu' => $request->input('menu'), 
           'location' => $request->input('location'),
           'additional_info' => $request->input('additional_info'),  
           'date' => $request->input('date'),
           'start_time' => date("H:i:s", strtotime($request->input('start_time'))),
           'end_time' => date("H:i:s", strtotime($request->input('end_time'))),
           'price' => $request->input('price'),
           'image' => $request->input('image'),
        ]);

        $reserve->save();
        Mail::send(new ReservationPlaced($reserve));

        return redirect()->route('thankyou.index')->with('success_message','Well done Your Reservation has been send! Thank you!');
    }

    public function car_store(Request $request)
    {
        //return $request->all();
        $reserve = CarRentalReservation::create([
           'user_id' => auth()->user() ? auth()->user()->id : null,
           'customer_fname' => $request->input('customer_fname'),
           'customer_lname' => $request->input('customer_lname'),
           'email' => $request->input('email'),
           'phone' => $request->input('phone'),
           'address' => $request->input('address'),
           'barangay' => $request->input('barangay'),
           'city' => $request->input('city'), 
           'province' => $request->input('province'), 
           'postal' => $request->input('postal'), 
           'car_name' => $request->input('car_name'), 
           'transmission' => $request->input('transmission'),
           'color' => $request->input('color'), 
           'seats' => $request->input('seats'), 
           'pickup_location' => $request->input('pickup_location'),  
           'start_date' => $request->input('start_date'),
           'start_time' => date("H:i:s", strtotime($request->input('start_time'))),
           'dropoff_location' => $request->input('dropoff_location'),
           'end_date' => $request->input('end_date'),
           'end_time' => date("H:i:s", strtotime($request->input('end_time'))),
           'price' => $request->input('price'),
           'image' => $request->input('image'),
        ]);

        $reserve->save();
        Mail::send(new ReservationPlaced($reserve));

        return redirect()->route('thankyou.index')->with('success_message','Well done Your Reservation has been send! Thank you!');
    }
}
