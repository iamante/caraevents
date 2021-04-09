@extends('layouts.app')
@section('content')
    <div class="bg-light">
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-md-8 mb-3">
                    <div class="row bg-white shadow-sm p-5">
                        <div class="col-md-7">
                            <img src="{{ asset('storage/'.$rentals->image )}}" alt="" class="" height="400">
                        </div>
                        <div class="col-md-5">
                            <h2 class="mb-2">{{ $rentals->name }}</h2>
                            <p class="bg-success text-white px-1 mb-3" style="display: inline-block">For Rent</p>
                            <p class="mb-2"><span class="font-weight-bold">Details</span></p>
                            <p class="mb-2"><span class="font-weight-bold">Color:</span> {{ $rentals->color }}</p>
                            <p class="mb-2"><span class="font-weight-bold">Type:</span> Slim</p>
                            {{-- <p class="mb-2">Availability: {{ $rentals->availability }}</p> --}}
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-2 mr-3"><span class="font-weight-bold">Size:</span></p>
                                <button type="button" class="bg-white border-0 text-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-ruler"></i> Size Guide
                                </button>
                            </div>

                            <div>
                                {!! $rentals->details !!}
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Size Guide</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('storage/'. $rentals->size_chart) }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col mt-5">
                            <h5>Description</h5>
                            <p>{!! $rentals->description !!}</p>
                            <div class="mt-5">
                                <h5>Caraevents Office</h5>
                                <p class="mb-1">Block 85 Lot 29A, Riyal Street, United North Park, Phase 8, Fairview Subdivision Quezon City</p>
                                <iframe class="img-fluid mt-3" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15436.703142064003!2d121.0565013!3d14.7026491!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcace75fb83bd1c1e!2sCara%20Events%20Philippines!5e0!3m2!1sen!2sph!4v1600268794813!5m2!1sen!2sph" width="1920" height="1920" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <p class="mb-0">Rental Summary</p>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $rentals->name }}</p>
                            <p class="mb-1"><small>Qty</small></p>
                            <input type="text" class="form-control" value="1">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">Total</p>
                                <h3 class="py-3 mb-0">₱ {{ $rentals->price }}</h3>
                            </div>
                            <p class="font-weight-bold mb-0">Please Note:</p>
                            <small>Please see the Size Reference to find the correct size</small>
                            <button class="btn btn-success w-100 mt-2">Rent</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-8 border-0 shadow-sm py-3 bg-white rounded">
                    @if ($rentals->comments->count() == 0)
                    @else
                        <p class="bg-light p-3">Comments {{ $rentals->comments->count() }}</p>
                    @endif
                        @comments(['model' => $rentals])
                </div>
                <div class="col-md-4 p-4">
                <small>
                <i>Like us on <a href="https://www.facebook.com/caraevents/">facebook</a> to get updates on our latest promotions! <br>
                    Subscibe us on <a href="https://www.youtube.com/channel/UCwnkAYO7K2WKn4aZt3iyCFw" class="text-danger">youtube</a>to see our “behind the seems” updates!</i></small>
                    
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
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
            </div> --}}
        </div>
    </div>

@endsection