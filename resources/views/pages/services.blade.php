@extends('layouts.app')
@section('content')
    @include('include.navigation')
    <div class="services-container container-fluid bg-white" style="padding-left: 90px; padding-right: 90px;">
        <div class="row">
            <div class="col-lg-2 col-sm-5 p-0 mt-4">
                <div style="font-size: 13px;"><a href="/" class="text-muted">Home</a><i class="fa fa-angle-right mx-2 pr-0 text-muted" aria-hidden="true"></i>{{ $title }}</div>
                <ul class="list-group">
                    <div class="py-2 font-weight-bold"><a href="/services" style="color: black">Categories</a></div>
                        @foreach ($categories as $category)
                            <li style="font-size: 13px;" class="my-1 {{ request()->category == $category->slug ? 'active' : '' }}"><a class="text-dark" href={{ route('services.index', ['category' => $category->slug ]) }}>{{ $category->name}}</a> ( {{$category->services->count()}} )</li>
                        @endforeach
                </ul>
                <div class="spacer my-3"></div>
            </div>
            <div class="col-lg-10 col-sm-7">
                <div class="bg-light py-3 px-4 mt-4 d-flex align-items-center">
                    <h3 class="mb-0 pr-3 font-weight-bold">{{ $categoriesName }} 
                        @if ($services->count() == 0)
                        <span class="text-muted" style="font-size: 14px; font-weight: 100;">Showing {{$services->total()}} results</span>
                        @else
                        <span class="text-muted" style="font-size: 14px; font-weight: 100;">Showing 1-{{ $services->count() }} of {{$services->total()}} results</span> 
                        @endif
                    </h3>
                </div>
                <div class="row mt-3">
                    <div class="col-md-8">
                        <div class="dropdown">
                            <button class="btn btn-default border dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false" style="border-radius: 0;">
                              Most Popular <i class="fa fa-angle-down mx-1" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <li><a class="dropdown-item" href="{{ route('services.index', ['catergory'=> request()->category, 'sort' => 'high_low']) }}">Price High to Low</a></li>
                              <li><a class="dropdown-item" href="{{ route('services.index', ['catergory'=> request()->category, 'sort' => 'low_high']) }}">Price Low to High</a></li>
                              <li><a class="dropdown-item" href="#">Recommended</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                        <div class="col-lg-4 col-md-12 col-sm-12 p-1 services-card">
                            <a href="{{ route('services.show', $service->slug ) }}">
                                <div class="row m-1">
                                    <div class="col-12 pr-0 pl-2 py-2">
                                        <img class="img-fluid w-100 services-image rounded" src={{ asset('storage/'. $service->image) }} alt="" style="height: 250px;">
                                    </div>
                                    <div class="col-12 py-1 text-center">
                                        <h5 class="card-title mb-0" style="line-height: 12px;">{{ $service->name }}</h5>
                                        <span class="text-muted mb-0" style="border-radius: 20px;text-transform:uppercase; font-size: 13px;">{{ $service->details }}</span>
                                        <p class="mb-0 text-dark" style="font-size: 18px; font-weight:bold; letter-spacing:1px; line-height: 20px;">{{ $service->presentPrice() }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="ml-4 py-3">No items Found!</div>
                    @endforelse
                    
                    <div class="mx-auto py-4">{{ $services->appends(request()->input())->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection