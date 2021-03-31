<?php

namespace App\Http\Controllers;

use App\Service;
use App\Reservation;
use App\ReservationService;
use Illuminate\Http\Request;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
