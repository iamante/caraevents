@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 px-3">
                    <div >
                        <div class="d-flex align-items-center mb-3 bg-white shadow-sm p-3">
                            
                            <img src="{{ asset('storage/'. auth()->user()->avatar) }}" alt="" class="img-fluid mr-3" width="50"style="border-radius: 50%;">
                           
                            <div>
                                <a href="/user-profile" class="text-dark font-weight-bold">
                                    {{ Auth::user()->name }}
                                </a>
                            <p class="mb-0 text-muted"><i class="fa fa-marker"></i> Edit Profile</p>
                            </div>
                        </div>
                        
                        <ul class="list-unstyled bg-white shadow-sm p-3" style="font-size: 14px;">
                            <li class="pb-1"><i class="far fa-user mr-3 ml-1"></i><a href="/user-profile"> Profile</a></li>
                            <li class="pb-1"><i class="fa fa-ticket-alt mr-3 ml-1"></i><a href="/my-reservation" class="font-weight-bold text-dark">Reservation</a></li>
                            <li class="pb-1"><img src="{{ asset('images/icons/logout.svg')}}" alt="logout" width="18" class="mr-3">
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
                <div class="col-lg-9 bg-white p-0 shadow-sm">
                    <h4 class="mb-4 bg-dark text-white px-5 py-4">My Reservation</h4>
                    <div class="row px-5 mb-2">
                        @if ($reserves->isEmpty())
                            <div class="p-3">You dont have reservation yet! Check our events now and inquire for reservation <a href="/services">here</a>. </div>
                        @else
                            @foreach ($reserves as $reserve)
                                <div class="col-md-6 mb-3  font-weight-bold">
                                    <div class="card border" style="height: 14rem">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <p class="font-weight-bold mb-0">Reservation #{{ $reserve->id }}</p>
                                            <p class=" mb-0">| <a href="{{ route('reservation.show', $reserve->id ) }}">Order Details</a></p>
                                        </div>
                                        <div class="card-body d-flex p-0 align-items-center">
                                            <img src={{ asset('storage/'. $reserve->image) }} alt="" class="img-fluid w-50 p-3">
                                            <div class="w-50 pl-2">
                                                <div class="mb-0 font-weight-bold">{{ $reserve->name }}</div>
                                                <p>{{ $reserve->details }}</p>
                                                <p class="font-weight-bold">Reserve Date: <br> {{ $reserve->formatDate() }} {{ $reserve->formatTime() }}</p>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between px-3 py-2">
                                            <div>
                                                @if ($reserve->status == 0)
                                                    <p class="mb-0">Status: <span class="bg-danger px-4 py-1 rounded text-white" style="font-size: 12px">Pending</span></small>
                                                @else
                                                    <p class="mb-0">Status: <span class="bg-success px-4 py-1 rounded text-white" style="font-size: 12px">Confirmed</span></p>
                                                @endif
                                            </div>
                                            <p class="mb-0 font-weight-bold">Total: {{ $reserve->presentPrice() }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection