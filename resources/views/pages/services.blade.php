@extends('layouts.app')
@section('content')

    <div class="parallax-img bg-dark" style="">
        <img src="{{ asset('images/services-hero.jpg')}}" alt="" class="img-fluid">
        <div class="parallax-text">
            <h1 class="mb-3" style="font-weight: 400;">Services Package</h1>
            <div class="position-relative">
                <i class="fas fa-concierge-bell"></i>
                <div class="hr-line"></div>
            </div>
        </div>
    </div>

    <div class="services-container container-fluid bg-white" style="padding-left: 90px; padding-right: 90px;">
        <div class="row">
            <div class="col-lg-2 col-sm-5 p-0 mt-4">
                <div style="font-size: 13px;"><a href="/" class="text-dark"> <i class="fa fa-home"></i> Home</a><i class="fa fa-angle-right mx-2 pr-0 text-muted" aria-hidden="true"></i>{{ $title }}</div>
                <ul class="list-group">
                    <div class="mb-2 mt-4 mr-5 pl-2 font-weight-bold text-white bg-dark">Categories</div>
                    <a href="/services" class=" text-dark"><div class="py-2 pl-3">All Services</div></a>
                        @foreach ($categories as $category)
                            <li class="my-1 pl-3 {{ request()->category == $category->slug ? 'active' : '' }}"><a class="text-dark" href={{ route('services.index', ['category' => $category->slug ]) }}>{{ $category->name}}</a> ( {{$category->services->count()}} )</li>
                        @endforeach
                </ul>
                <div class="spacer my-3"></div>

                <ul class="list-group">
                    <div class="mb-2 mt-4 mr-5 pl-2 font-weight-bold text-white bg-dark">Price</div>
                    <li class="my-1 pl-3"><a href="{{ route('services.index', ['catergory'=> request()->category, 'sort' => 'high_low']) }}" class=" text-dark">> High to Low</a></li>
                    <li class="my-1 pl-3"><a href="{{ route('services.index', ['catergory'=> request()->category, 'sort' => 'low_high']) }}" class=" text-dark">> Low to High</a></p></li>
                </ul>

            </div>
            <div class="col-lg-10 col-sm-7">
                <div class="row py-3 mt-4 bg-light">
                    <div class="col-md-7">
                        <h3 class="mb-0 mt-2 pr-3 font-weight-bold">{{ $categoriesName }} 
                            @if ($services->count() == 0)
                            <span class="text-muted" style="font-size: 14px; font-weight: 100;">Showing {{$services->total()}} results</span>
                            @else
                            <span class="text-muted" style="font-size: 14px; font-weight: 100;">Showing 1-{{ $services->count() }} of {{$services->total()}} results</span> 
                            @endif
                        </h3>
                    </div>
                    <div class="col-md-5">
                        <form action="{{ route('search') }}" method="GET" class="search-form">
                            <div class="input-group bg-white border search d-flex align-items-center">
                                <input id="query" type="search" name="query" class="form-control rounded border-0" placeholder="Search" aria-label="Search"
                                aria-describedby="search" value="{{ request()->input('query') }}" />
                                <i class="fas fa-times"></i>
                                <button type="submit" class="input-group-text border-0 bg-light py-3 px-4" id="search">
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
                                        <img class="img-fluid w-100 mb-2 services-image rounded" src={{ asset('storage/'. $service->image) }} alt="" style="height: 250px;">
                                    </div>
                                    <div class="col-12 py-1 text-center mb-4">
                                        <h3 class="card-title mb-2 text-dark">{{ $service->name }}</h3>
                                        <span style="color: rgb(10, 112, 10);border-radius: 20px;font-size: 15px;">{{ $service->details }}</span>
                                        <p class="mb-0 text-dark" style="font-size: 18px; letter-spacing:1px; line-height: 20px;">{{ $service->presentPrice() }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="ml-4 py-5">No items Found!</div>
                    @endforelse
                    
                </div>
                <div class="d-flex justify-content-center">
                     <div class="mx-auto py-4">{{ $services->appends(request()->input())->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection