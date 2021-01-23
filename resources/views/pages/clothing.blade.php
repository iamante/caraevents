@extends('layouts.app')
@section('content')
@include('include.navigation')
    <div class="container pb-5 pt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-body p-1 d-flex align-items-center justify-content-between">
                        <input class="w-100 py-1 px-3 services-input" type="text" placeholder="Search Services" style="border: none"> <i class="fa fa-search px-3"></i>
                    </div>
                </div>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <a href="/services">
                            <div class="list-group-item py-2 text-muted">Show All</div>
                        </a>
                        <a href="/services">
                            <div class="list-group-item py-2 text-muted">Gown</div>
                        </a>
                        <a href="/services">
                            <div class="list-group-item py-2 text-muted">Barong</div>
                        </a>
                        <a href="/services">
                            <div class="list-group-item py-2 text-muted">Coat</div>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach ($rentals as $rental)
                        <div class="col-md-4">
                            <a href="{{ route('clothrentals.show', $rental->slug ) }}">
                                <div class="card">
                                    <img class="card-img-top img-fluid px-4 pt-4" src="{{ asset('images/rent/'.$rental->slug.'.png')}}" alt="violette">
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $rental->name }}</h5>
                                    <small class="bg-info text-white px-1">For Rent</small>
                                    <p class="card-text mb-0">{{ $rental->details }}</p>
                                    <h5>₱ {{$rental->price}}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection