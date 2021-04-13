@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 px-3">
                    <div >
                        <div class="d-flex align-items-center mb-3 bg-white shadow-sm p-3">
                            @if (auth()->user()->avatar == 'users/default.png')
                            <img src="{{ asset('storage/'. auth()->user()->avatar) }}" alt="" class="img-fluid mr-3" width="50"style="border-radius: 50%;">
                            @else
                            <img src="{{ asset('storage/users/'. auth()->user()->avatar) }}" alt="" class="img-fluid mr-3" width="50"style="border-radius: 50%;">
                            @endif
                            <div>
                                <a href="/user-profile" class="text-dark font-weight-bold">
                                    {{ Auth::user()->name }}
                                </a>
                            <p class="mb-0 text-muted"><i class="fa fa-marker"></i> Edit Profile</p>
                            </div>
                        </div>
                        
                        <ul class="list-unstyled bg-white shadow-sm p-3" style="font-size: 14px;">
                            <li class="pb-1"><i class="far fa-user mr-3 ml-1"></i><a href="/user-profile">Profile</a></li>
                            <li class="pb-1"><i class="fa fa-ticket-alt mr-3 ml-1"></i><a href="/my-reservation">Reservation</a></li>
                            <li class="pb-1"><img src="{{ asset('images/icons/logout.svg')}}" alt="logout" width="18" class="mr-3 rounded">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                
                                <form action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form> 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 bg-white shadow-sm rounded px-0 font-weight-bold">
                    <div class="bg-dark text-white">
                        <h4 class="font-weight-bold py-4 px-5">Reserve no. {{ $service->id }}</h4>
                    </div>
                    <div class="row px-5 py-3">
                        <div class="col-6">
                            <p class="">Customer Info</p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1">{{ auth()->user()->name }} {{ $service->customer_lname }}</p>
                            <p class="mb-1">{{ $service->address }} {{ $service->barangay }}</p>
                            <p class="mb-1">{{ $service->city }}, {{ $service->province }} {{ $service->postal }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row px-5 py-3">
                        <div class="col-6">
                            <p>Reservation Info</p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1">{{ $service->name }}<br> ( {{ $service->details }} )</p>
                            <p class="mb-1">{{ $service->guests }}</p>
                            <p class="mb-1">{{ $service->menu }}</p>
                            <p class="mb-1">{{ $service->location }}</p>
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row px-5 py-3">
                        
                        <div class="col-6 mb-3">
                            <p>Date</p>
                        </div>
                        <div class="col-6 mb-3">
                            <p class="mb-1">{{ $service->formatDate() }}</p>
                            <p class="mb-1">From {{ $service->formatTime() }} to {{ $service->formatEndTime() }}</p>
                        </div>
                        
                        <div class="col-6">
                            <p>Total</p>
                        </div>
                        <div class="col-6">
                            <p>{{ $service->presentPrice() }}</p>
                        </div>

                    </div>
                    <hr>
                    <div class="row px-5 py-3">
                        <div class="col-6">
                            <p>Email receipt sent to</p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                                
                    <div class="p-3 text-center">
                        <img src="{{ asset('storage/users/logo1.png') }}" alt="logo" class="img-fluid" width="50">
                        <div>
                            <small class="text-muted mb-0">Caraevents <span>Consultancy & Co.</span></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection