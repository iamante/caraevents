@extends('layouts.app')
@section('content')

    <div class="parallax-img bg-dark" style="">
        <img src="{{ asset('images/cloth-hero.jpg')}}" alt="" class="img-fluid">
        <div class="parallax-text">
            <h1 class="mb-3" style="font-weight: 400;">Rent a Gown, Coat, Barong etc.</h1>
            <div class="position-relative">
                <i class="fas fa-tshirt"></i>
                <div class="hr-line"></div>
            </div>
        </div>
    </div>

    <div class="container p-5">
        <div class="row">
            <div class="col-md-3">
                <div style="font-size: 13px;"><a href="/" class="text-dark"> <i class="fa fa-home"></i> Home</a><i class="fa fa-angle-right mx-2 pr-0 text-muted" aria-hidden="true"></i>{{ $title }}</div>
                <ul class="list-group">
                    <div class="mb-2 mt-4 mr-5 pl-2 font-weight-bold text-white bg-dark">Categories</div>
                    <a href="/services" class=" text-dark"><div class="py-2 pl-3">All Services</div></a>
                        <li class="my-1 pl-3"><a class="text-dark">Gown</a></li>
                        <li class="my-1 pl-3"><a class="text-dark">Coat</a></li>
                        <li class="my-1 pl-3"><a class="text-dark">Barong</a></li>
                </ul>
                <div class="spacer my-3"></div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach ($rentals as $rental)
                        <div class="col-md-4 text-center">
                            <a href="{{ route('clothrentals.show', $rental->slug ) }}" style="text-decoration: none">
                                <div class="card text-dark bg-light">
                                    <img class="card-img-top img-fluid" src="{{ asset('storage/'.$rental->image)}}" alt="violette">
                                    <div class="card-body">
                                    <h5 class="card-title mb-2">{{ $rental->name }}</h5>
                                    {{-- <p class="card-text mb-2">{{ $rental->details }}</p> --}}
                                    <p class="bg-success text-white px-1" style="display: inline-block">For Rent</p>
                                    <h4>{{$rental->presentPrice()}}</h4>
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