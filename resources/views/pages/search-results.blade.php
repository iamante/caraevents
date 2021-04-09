@extends('layouts.app')
@section('content')
    <div class="services-container container-fluid bg-white py-5" style="padding-left: 90px; padding-right: 90px;">
        <div class="row">
            <div class="col-lg-12 col-sm-7">
                <div class="mt-3" style="font-size: 13px;"><a href="/" class="text-muted">Home</a><i class="fa fa-angle-right mx-2 pr-0 text-muted" aria-hidden="true"></i>{{ $title }}</div>
                <div class="row">
                    <div class="col-md-8 bg-light py-3 px-4 mt-3">
                        <h3 class="mb-0 pr-3 font-weight-bold">
                            <span class="text-muted" style="font-size: 14px; font-weight: 100;">Search Showing {{$services->total()}} results</span>
                        </h3>
                    </div>
                    <div class="col-md-4 bg-light py-3 px-4 mt-3">
                        <form action="{{ route('search') }}" method="GET" class="search-form">
                            <div class="input-group border search" style="position: relative">
                                <input id="query" type="search" name="query" class="form-control rounded border-0" placeholder="Search" aria-label="Search"
                                  aria-describedby="search" value="{{ request()->input('query') }}" />
                                <i class="fas fa-times"></i>
                                <button type="submit" class="input-group-text border-0 bg-light" id="search">
                                  <i class="fas fa-search"></i>
                                </button type="submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    @forelse ($services as $service)
                        <div class="col-lg-3 col-md-12 col-sm-12 p-1 services-card">
                            <a href="#">
                                <div class="row m-1">
                                    <div class="col-12 pr-0 pl-2 py-2">
                                        <a href="{{ route('services.show', $service->slug) }}"><img class="img-fluid w-100 services-image rounded" src={{ asset('storage/'. $service->image) }} alt="" style="height: 250px;"></a>
                                    </div>
                                    <div class="col-12 py-1 text-center">
                                        <h5 class="card-title mb-0" style="line-height: 12px;">{{ $service->name }}</h5>
                                        <span class="text-muted mb-0" style="border-radius: 20px;text-transform:uppercase; font-size: 13px;">{{ $service->details }}</span>
                                        <p class="mb-0 text-dark" style="font-size: 18px; font-weight:bold; letter-spacing:1px; line-height: 20px;">{{ $service->presentPrice() }}</p>
                                        <span class="fa fa-star checked" style="color: orange; font-size: 10px"></span>
                                        <span class="fa fa-star checked" style="color:orange; font-size: 10px"></span>
                                        <span class="fa fa-star checked" style="color: orange; font-size: 10px"></span>
                                        <span class="fa fa-star" style="color: orange; font-size: 10px"></span>
                                        <span class="far fa-star" style="color: orange; font-size: 10px"></span>
                                        <span style="font-size: 10px">( 509 )</span>
                                        <div class="d-flex justify-content-between align-items-center">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="ml-4 py-3">No items Found!</div>
                    @endforelse
                </div>
                <div class="mx-auto py-4">{{ $services->appends(request()->input())->links() }}</div>
            </div>
        </div>
    </div>
@endsection



{{-- @extends('layouts.app')
@section('content')
@include('include.navigation')
    <div class="container pt-3 pb-3">
        {{-- <div class="w-50 d-flex align-items-center">
            @if (session()->has('success_message'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>

        <h1>{{ $title }}</h1>
        <p>{{ $services->count() }} Results for '{{ request()->input('query') }}'</p>
        @foreach ($services as $service)
        <img class="img-fluid services-image rounded" src={{ asset('storage/'. $service->image) }} alt="" style="height: 250px;">
            <div>{{ $service->name }}</div>
            <div>{{ $service->details }}</div>
            <div>{{ strip_tags($service->description) }}</div>
            <div>{{ $service->price }}</div>
        @endforeach
    </div>--}}