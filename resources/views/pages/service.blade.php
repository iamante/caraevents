@extends('layouts.app')
@section('content')
<img src={{ asset('storage/'. $service->image) }} alt="" style="object-fit: cover; max-height: 400px; width: 100%">
<div class="bg-light">
  <div class="container pb-5 pt-3">
        <div class="row pt-3 mb-4">
            <div class="col-lg-8 border-0 rounded shadow-sm bg-white py-3 mb-4">
              <div class="container">
                @component('components.breadcrumbs')
                  <a href="/" style="font-size: 12px;"><i class="fa fa-home text-muted"></i></a>
                  <i class="fa fa-chevron-right breadcrumb-separator px-2 text-muted"  style="font-size: 12px"></i>
                  <span><a href="{{ route('services.index') }}"  style="font-size: 12px" class=" text-muted">Services</a></span>
                  <i class="fa fa-chevron-right breadcrumb-separator px-2 text-muted"  style="font-size: 12px"></i>
                  <span class="text-muted"  style="font-size: 12px">{{ $service->name }}</span>
                @endcomponent
                
                <h1 class=" font-weight-bold text-muted">{{ $service->name }}</h1>
                <h6 class="mb-0 font-weight-bold" style="padding-top:3px; padding-bottom:3px; border-radius: 20px; text-transform: uppercase; color:azure; background-color:#57b67e; width: 120px; text-align:center"><i class="fas fa-box-open" style="font-size: 12px;"></i> {{ $service->details }}</h6>
                <hr>
                <div class="border p-4">
                  <h5 class="font-weight-bold">About this Service :</h5>
                    <p class="pl-5">{!! $service->description !!}</p>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4">
                <div class="container">
                  <div class="card shadow-sm border-0">
                    <iframe class="img-fluid" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15436.703142064003!2d121.0565013!3d14.7026491!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcace75fb83bd1c1e!2sCara%20Events%20Philippines!5e0!3m2!1sen!2sph!4v1600268794813!5m2!1sen!2sph" width="1920" height="1920" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
           
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 font-weight-bold">{{ $service->name }}</h5>
                            <div class="text-muted">
                                <span><i class="far fa-heart px-1"></i></span>
                                <span><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                        <span class="text-uppercase text-danger">{{ $service->details }}</span>
                        <p class="mb-0" style="font-size: 25px; font-weight: bold">{{ $service->presentPrice() }}</p>
                      <hr>
                        <ul class="list-unstyled d-flex justify-content-around py-2">
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fas fa-users text-dark" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1 text-dark" style="font-size: 12px;">30 Guests</p>
                            </div>
                          </li>
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fas fa-volume-up text-dark" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1 text-dark" style="font-size: 12px;">Basic Sound System</p>
                            </div>
                          </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-around">
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fa fa-utensils text-dark" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1 text-dark" style="font-size: 12px;">Menu No.1</p>
                            </div>
                          </li>
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fa fa-birthday-cake text-dark" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1 text-dark" style="font-size: 12px;">Wedding Cake</p>
                            </div>
                          </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-around">
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fa fa-birthday-cake text-dark" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1 text-dark" style="font-size: 12px;">Wedding Cake</p>
                            </div>
                          </li>
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fa fa-birthday-cake text-dark" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1 text-dark" style="font-size: 12px;">Free Aircon Venue</p>
                            </div>
                          </li>
                        </ul>
                      <form action="{{ route('reserve.index', $service->slug )}}" method="POST">
                        @method('GET')
                        @csrf
                      <input type="hidden" name="id" value="{{ $service->id }}">
                      <input type="hidden" name="name" value="{{ $service->name }}">
                      <input type="hidden" name="price" value="{{ $service->price }}">
                      <input type="hidden" name="detail" value="{{ $service->details }}">
                      <button type="submit" class="w-100 mt-2 py-1 text-white text-uppercase btn btn-success">Reserve Now</button>
                    </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
          <div class="col-lg-8 border-0 shadow-sm bg-white py-3 rounded">
           @if ($service->comments->count() == 0)
           @else
              <p>Comments {{ $service->comments->count() }}</p>
           @endif
            @comments(['model' => $service])
          </div>
          <div class="col-lg-4 bg-light py-3 px-5">
            <small><i>Like us on <a href="">facebook</a> to get updates on our latest promotions! <br>
              Subscibe us on <a href="" class="text-danger">youtube</a> to see our “behind the seems” updates!</i></small>
          </div>
        </div>
    </div>
</div>
@endsection