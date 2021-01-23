<?php

namespace App\Http\Controllers;

use App\Service;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $title = 'Reservation';
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('pages.reservation')->with(['service' => $service, 'title' => $title]);
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
           'email' => $request->input('email'),
           'phone' => $request->input('phone'),
           'address' => $request->input('address'),
           'city' => $request->input('city'), 
           'province' => $request->input('province'), 
           'postal' => $request->input('postal'), 
           'name' => $request->input('name'), 
           'details' => $request->input('details'), 
           'date' => $request->input('date'),
           'time' => $request->input('time'),
           'price' => $request->input('price'),
        ]);

        $reserve->save();
        return redirect()->route('thankyou.index')->with('success_message','Thank you! Your Reservation has been send!');
    
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
