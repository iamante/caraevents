@extends('layouts.app')
@section('content')
@include('include.navigation')
    <div class="container pt-3 pb-3">
        <div class="row no-gutters">
            @foreach ($rentals as $rental)
            <div class="col-12 border my-2">
                <div class="row align-items-center py-1 px-3 mb-3">
                    <div class="col"><img src={{ asset('images/rent/'.$rental->slug.'.png') }} alt="" class="img-fluid w-60"></div>
                    <div class="col p-3">
                        <h3> {{ $rental->name }} </h3>
                        <span></span>
                        <h6>Unlimited Hour with 3 Stations only :</h6>
                        <ul>
                            <li><i class="fas fa-user text-muted"></i> 5</li>
                            <li>Dressing</li>
                            <li>Church</li>
                            <li>Reception</li>
                        </ul>
                        <h3 class="font-weight-bold mb-0">₱ {{ $rental->price}}</h3>
                        
                    </div>
                    <div class="col">
                        <form action="">
                            <div class="card">
                                <div class="form-group mx-2 pt-2 px-2">
                                    <label for="province">Drop-off</label>
                                    <div class="d-flex align-items-center w-100 mr-1 align-items-center border rounded">
                                        <i id="calendar" class="fa fa-map-marker-alt text-muted pl-3 pr-1 py-2"></i>
                                        <input type="text" name="province" class="form-control mr-1" style="border: none" placeholder="Meet-up" required>
                                    </div>
                                </div>
                                <div class="form-group mx-2 pt-2 px-2 d-flex justify-content-between">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center w-50 mr-1 align-items-center border rounded">
                                            <i id="calendar" class="fa fa-calendar-alt text-muted pl-3 pr-1 py-2"></i>
                                            <input type="text" name="province" class="form-control mr-1" style="border: none" placeholder="To" required>
                                        </div>
                                        <div class="d-flex align-items-center w-50 mr-1 align-items-center border rounded">
                                            <i id="calendar" class="fa fa-calendar-alt text-muted pl-3 pr-1 py-2"></i>
                                            <input type="text" name="province" class="form-control mr-1" style="border: none" placeholder="From" required>
                                        </div>
                                    </div>
                                </div>
                                  <div class="card-footer">
                                    <button class="btn btn-success w-100">Rent</button>
                                  </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
@endsection