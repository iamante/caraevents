@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 px-3">
                    <div >
                        <div class="d-flex align-items-center mb-3 bg-white shadow-sm p-3">
                            @if (auth()->user()->avatar == 'users/default.png')
                            <img src="{{ asset('storage/'. auth()->user()->avatar) }}" alt="" class="img-fluid mr-3" width="50"style="border: 1px solid #cccccc; border-radius: 50%;">
                            @else
                            <img src="{{ asset('storage/users/'. auth()->user()->avatar) }}" alt="" class="img-fluid mr-3" width="50"style="border: 1px solid #cccccc; border-radius: 50%;">
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
                <div class="col-lg-7 bg-white px-5 py-3 shadow-sm rounded">
                    <h4 class="font-weight-bold text-center w-100 p-3" style="border-bottom: 1px dashed rgb(206, 206, 206);">Reserve no. {{ $service->id }}</h4>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="text-muted">Customer Name</td>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Address</td>
                                <td>{{ $service->address }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">City / Provice</td>
                                <td>{{ $service->city }}, {{ $service->province }} {{ $service->postal }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Reservation Name</td>
                                <td>{{ $service->name }}, ( {{ $service->details }} )</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Reserve Date</td>
                                <td>{{ $service->date }}, {{ $service->time}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Total Amount</td>
                                <td>{{ $service->presentPrice() }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Email Receipt Send To</td>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                        </tbody>
                      </table>
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