@extends('layouts.app')
@section('content')
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-2">
                <ul class="list-unstyled gallery-category">
                    <li>All</li>
                    <li>Wedding</li>
                    <li>Debut</li>
                    <li>Birthday</li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="card-columns">
                  <div class="card-container">
                      @foreach ($gallery as $item)
                          <img alt="picture" src={{ asset('storage/'. $item->image) }} class="img-fluid img-thumbnail mb-2">
                      @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection