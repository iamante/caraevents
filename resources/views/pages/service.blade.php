@extends('layouts.app')
@section('content')
<img src={{ asset('storage/'. $service->image) }} alt="" style="object-fit: cover; max-height: 400px; width: 100%">
<div class="bg-light">
  <div class="container pb-5 pt-3">
        <div class="row pt-3 mb-4">
            <div class="col-lg-8 border-0 rounded shadow-sm bg-white px-0 mb-4">
              <div class="px-5 pt-5 pb-4">
                @component('components.breadcrumbs')
                  <a href="/" style="font-size: 12px;">Home</a>
                  <i class="fa fa-chevron-right breadcrumb-separator px-2 text-muted"  style="font-size: 12px"></i>
                  <span><a href="{{ route('services.index') }}"  style="font-size: 12px" class=" text-muted">Services</a></span>
                  <i class="fa fa-chevron-right breadcrumb-separator px-2 text-muted"  style="font-size: 12px"></i>
                  <span class="text-muted"  style="font-size: 12px">{{ $service->name }}</span>
                @endcomponent
                <h1 class=" font-weight-bold text-muted" style="letter-spacing: 2px;">{{ $service->name }}</h1>
                <h6 class="mb-0 font-weight-bold" style="padding-top:3px; padding-bottom:3px; border-radius: 20px; text-transform: uppercase; color:azure; background-color:#38c172; width: 120px; text-align:center"><i class="fas fa-box-open" style="font-size: 12px;"></i> {{ $service->details }}</h6>
              </div>
              <hr>
                <div class="px-5 py-3">
                  <h5 class="font-weight-bold">About this Service :</h5>
                    <p class="pl-5">{!! $service->description !!}</p>
                    <details>
                    <summary>Menus</summary>
                    <p>The arrangement of type involves the selection of typefaces, point size, line length, leading (line spacing), adjusting the spaces between groups of letters (tracking) and adjusting the space between pairs of letters (kerning).</p>
                    </details>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="container">
                  <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <div class="bg-dark p-4">
                          <h5 class="mb-0 font-weight-bold text-white">{{ $service->name }}</h5>
                          <span class="text-uppercase text-white">({{ $service->details }})</span>
                        </div>
                        <div class="p-4">
                          <div class="row align-items-center">
                            <div class="col-4">
                              <p class="text-muted text-right">Guest</p>
                            </div>
                            <div class="col-8 pl-0">
                              <input type="text" class="form-control mb-3" value="30" readonly>
                            </div>
                            <div class="col-4 ">
                              <p class="text-muted text-right">Location</p>
                            </div>
                            <div class="col-8 pl-0">
                              <select class="browser-default custom-select mb-3 text-center">
                                <option value="" selected>Quezon City</option>
                                <option value="">Manila</option>
                                <option value="">Bulacan</option>
                              </select>
                            </div>
                            <div class="col-4">
                              <p class="text-muted text-right">Menu</p>
                            </div>
                            <div class="col-8 pl-0">
                              <select class="browser-default custom-select mb-3 text-center">
                                <option value="" selected>Menu #1</option>
                                <option value="">Menu #2</option>
                                <option value="">Menu #3</option>
                              </select>
                            </div>
                          </div>
                          <p class="mb-0 text-right py-2" style="font-size: 18px"><span class="pr-2">Total</span> {{ $service->presentPrice() }}</p>
                          <form action="{{ route('reserve.index', $service->slug )}}" method="POST">
                            @method('GET')
                            @csrf
                          <input type="hidden" name="id" value="{{ $service->id }}">
                          <input type="hidden" name="name" value="{{ $service->name }}">
                          <input type="hidden" name="price" value="{{ $service->price }}">
                          <input type="hidden" name="detail" value="{{ $service->details }}">
                          <button type="submit" class="w-100 mt-2 py-2 text-white text-uppercase btn btn-success">Reserve Now</button>
                        </div>
                    </form>
                    </div>
                    <div class="card-footer text-center">
                      <ul class="list-unstyled d-flex justify-content-around align-items-center my-2">
                        <li><a href="tel:+639228097519"><i class="fas fa-phone text-muted"></i></a></li>
                        <li><a href="mailto:caraevents@gmail.com"><i class="fa fa-envelope text-muted"></i></a></li>
                        <li><a href="https://www.facebook.com/caraevents/"><i class="fab fa-facebook-f text-muted"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCwnkAYO7K2WKn4aZt3iyCFw"><i class="fab fa-youtube text-muted"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
          <div class="col-lg-8 border-0 shadow-sm py-3 bg-white rounded">
           @if ($service->comments->count() == 0)
           @else
              <p class="bg-light p-3">Comments {{ $service->comments->count() }}</p>
           @endif
            @comments(['model' => $service])
          </div>
          <div class="col-md-4 p-4">
            <small>
              <i>Like us on <a href="https://www.facebook.com/caraevents/">facebook</a> to get updates on our latest promotions! <br>
                Subscibe us on <a href="https://www.youtube.com/channel/UCwnkAYO7K2WKn4aZt3iyCFw" class="text-danger">youtube</a>to see our “behind the seems” updates!</i></small>
          </div>
        </div>
    </div>
</div>
@endsection