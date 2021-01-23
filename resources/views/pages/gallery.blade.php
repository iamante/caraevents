@extends('layouts.app')
@section('content')
    @include('include.navigation')
    
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-columns">
                  <div class="card-container">
                      @foreach ($gallery as $item)
                          <img alt="picture" src={{ asset('storage/'. $item->image) }} class="img-fluid py-2">
                      @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection