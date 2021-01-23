@extends('layouts.app')
@section('content')
@include('include.navigation')
    <div class="container pb-5 pt-3">
        <div class="row">
            <div class="col-md-8">
                    <div class="d-flex justify-content-center bg-white border p-3">
                        <img src="{{ asset('images/rent/'.$rentals->slug.'.png')}}" alt="" class="img-fluid">
                    </div>
                    
                    <div class="mt-2">
                        <div id="service-tabs">
                            <ul>
                              <li><a href="#tabs-1">Description</a></li>
                              <li><a href="#tabs-2">Reviews (0)</a></li>
                            </ul>
                            <div id="tabs-1">
                                <hr>
                              <p>{{ $rentals->description }}</p>
                            </div>
                            <div id="tabs-2">
                                <hr>
                              <p>There are no reviews for this product.</p>
                            </div>
                     </div>
                    </div>

            </div>
            <div class="col-md-4">
                <form action="">
                    <div class="card p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>{{ $rentals->name }}</h2>
                            <div class="text-muted">
                                <span><i class="far fa-heart px-1"></i></span>
                                <span><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                        <small>Color: {{ $rentals->color }}</small>
                        <small>Type: {{ $rentals->details }}</small>
                        <small>Availability: {{ $rentals->availability }}</small>
                        <h3 class="py-3 mb-0">₱ {{ $rentals->price }}</h3>
                        <p class="mb-1"><small>Qty</small></p>
                        <input type="text" class="form-control" value="1">
                        <button class="btn btn-primary w-100 mt-2">Rent</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection