@extends('layouts.app')
@section('content')

    <div class="parallax-img bg-dark" style="">
        <img src="{{ asset('images/gallery-hero.jpg')}}" alt="" class="img-fluid">
        <div class="parallax-text">
            <h1 class="mb-3" style="font-weight: 400;">Our Gallery</h1>
            <div class="position-relative">
                <i class="fas fa-photo-video"></i>
                <div class="hr-line"></div>
            </div>
        </div>
    </div>

    <div class="container pt-3 pb-5">
        <div class="text-center my-3 gallery-category">
            @if (Request::fullUrl() == Request::url())
                <a href="/gallery"><button class="text-white" style="background-color: #666; ">All</button></a>
            @else
                <a href="/gallery"><button>All</button></a>
            @endif
            @foreach ($categories as $category)
                <a href={{ route('galleries.index', ['category' => $category->slug ]) }}><button class="mx-1 {{ request()->category == $category->slug ? 'active' : '' }}">{{ $category->name}}</button></a>
            @endforeach
        </div>
        <div class="row no-gutters my-5 gallery-img">
            <div class="col-md-12">
                <div class="card-columns">
                    @forelse ($galleries as $gallery)
                        <div class="card-container">
                      
                        <a rel="gallery" href="{{ asset('storage/'. $gallery->image) }}" class="fancybox" data-caption="{{ $gallery->name }}" data-id="{{ $gallery->id }}" data-fancybox>
                            <img alt="picture" src={{ asset('storage/'. $gallery->image) }} class="img-fluid gallery-pic">
                        </a>

                        
                        @empty
                        <div class="ml-4 py-5">No items Found!</div>
                       
                            <div class="mx-auto py-4">{{ $galleries->appends(request()->input())->links() }}</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection