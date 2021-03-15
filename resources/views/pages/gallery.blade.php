@extends('layouts.app')
@section('content')
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                    <div class="mb-2 mt-4 mr-5 pl-2 font-weight-bold text-white bg-dark">Categories</div>
                    <a href="/gallery" class=" text-dark"><div class="py-2 pl-3" style="font-size: 13px;">All Services</div></a>
                        @foreach ($categories as $category)
                            <li style="font-size: 13px;" class="my-1 pl-3 {{ request()->category == $category->slug ? 'active' : '' }}"><a class="text-dark" href={{ route('galleries.index', ['category' => $category->slug ]) }}>{{ $category->name}}</a> ( {{$category->galleries->count()}} )</li>
                        @endforeach
                </ul>
            </div>
            <div class="col-md-10">
                <div class="card-columns">
                  <div class="card-container">
                      @forelse ($galleries as $gallery)
                          <img alt="picture" src={{ asset('storage/'. $gallery->image) }} class="img-fluid img-thumbnail mb-2">
                        @empty
                        <div class="ml-4 py-5">No items Found!</div>
                        @endforelse
                      <div class="mx-auto py-4">{{ $galleries->appends(request()->input())->links() }}</div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection