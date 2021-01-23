@extends('layouts.app')
@section('content')
<img src={{ asset('storage/'. $service->image) }} alt="" style="object-fit: cover; max-height: 400px; width: 100%">
    <div class="container pb-5 pt-3">
        <div class="row pt-3 mb-4">
            <div class="col-lg-8 border rounded bg-white py-3 mb-4">
              <div class="container">
                @component('components.breadcrumbs')
                  <a href="/" style="font-size: 12px;"><i class="fa fa-home text-muted"></i></a>
                  <i class="fa fa-chevron-right breadcrumb-separator px-2 text-muted"  style="font-size: 12px"></i>
                  <span><a href="{{ route('services.index') }}"  style="font-size: 12px" class=" text-muted">Services</a></span>
                  <i class="fa fa-chevron-right breadcrumb-separator px-2 text-muted"  style="font-size: 12px"></i>
                  <span class="text-muted"  style="font-size: 12px">{{ $service->name }}</span>
                @endcomponent
                
                <h1 class=" font-weight-bold text-muted">{{ $service->name }}</h1>
                <h6 class="mb-0 font-weight-bold" style="padding-top:3px; padding-bottom:3px; border-radius: 20px; text-transform: uppercase; color:azure; background-color:rgb(13, 192, 34); width: 120px; text-align:center"><i class="fas fa-box-open" style="font-size: 12px;"></i> {{ $service->details }}</h6>
                <hr>
                <p class="font-weight-bold">Inclusion:</p> 
                <div class="d-flex justify-content-around border text-muted">
                  <div class="px-3 py-5 text-center">
                    <i class="fas fa-users" style="font-size: 30px;"></i>
                    <p class="mb-0 font-weight-bold pt-2" style="font-size: 12px;">30 Guests</p>
                  </div>

                  <div class="px-3 py-5 text-center">
                    <i class="fas fa-volume-up" style="font-size: 30px;"></i>
                      <p class="mb-0 font-weight-bold pt-2" style="font-size: 12px;">Basic Sound System</p>
                  </div>

                  <div class="px-3 py-5 text-center">
                    <i class="fa fa-utensils" style="font-size: 30px;"></i>
                      <p class="mb-0 font-weight-bold pt-2" style="font-size: 12px;">Menu No.1</p>
                  </div>

                  <div class="px-3 py-5 text-center">
                    <i class="fa fa-birthday-cake" style="font-size: 30px;"></i>
                      <p class="mb-0 font-weight-bold pt-2" style="font-size: 12px;">Wedding Cake</p>
                  </div>

                  <div class="px-3 py-5 text-center">
                    <i class="fa fa-birthday-cake" style="font-size: 30px;"></i>
                      <p class="mb-0 font-weight-bold pt-2" style="font-size: 12px;">Free Aircon Venue</p>
                  </div>
                </div>
                <hr>
                <div class="border p-4">
                  <h5 class="font-weight-bold">About this Service :</h5>
                    <p class="pl-5">{!! $service->description !!}</p>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4">
                <div class="container">
                  <div class="card">
                    <iframe class="img-fluid" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15436.703142064003!2d121.0565013!3d14.7026491!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcace75fb83bd1c1e!2sCara%20Events%20Philippines!5e0!3m2!1sen!2sph!4v1600268794813!5m2!1sen!2sph" width="1920" height="1920" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
           
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 font-weight-bold">{{ $service->name }}</h5>
                            <div class="text-muted">
                                <span><i class="far fa-heart px-1"></i></span>
                                <span><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                        <span class="text-muted text-uppercase">{{ $service->details }}</span>
                        <p class="mb-0" style="font-size: 25px; font-weight: bold"><span>₱</span>{{ $service->price }}</p>
                      <div class="spacer my-1"></div>
                        <ul class="list-unstyled d-flex justify-content-around py-2">
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fas fa-users" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1" style="font-size: 12px;">30 Guests</p>
                            </div>
                          </li>
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fas fa-volume-up" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1" style="font-size: 12px;">Basic Sound System</p>
                            </div>
                          </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-around">
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fa fa-utensils" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1" style="font-size: 12px;">Menu No.1</p>
                            </div>
                          </li>
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fa fa-birthday-cake" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1" style="font-size: 12px;">Wedding Cake</p>
                            </div>
                          </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-around">
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fa fa-birthday-cake" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1" style="font-size: 12px;">Wedding Cake</p>
                            </div>
                          </li>
                          <li class="w-100">
                            <div class="text-center">
                              <i class="fa fa-birthday-cake" style="font-size: 20px;"></i>
                                <p class="mb-0 font-weight-bold pt-1" style="font-size: 12px;">Free Aircon Venue</p>
                            </div>
                          </li>
                        </ul>
                        <hr>

                      <form action="{{ route('reserve.index', $service->slug )}}" method="POST">
                        @method('GET')
                        @csrf
                      <input type="hidden" name="id" value="{{ $service->id }}">
                      <input type="hidden" name="name" value="{{ $service->name }}">
                      <input type="hidden" name="price" value="{{ $service->price }}">
                      <input type="hidden" name="detail" value="{{ $service->details }}">
                      <button type="submit" class="text-white w-100 mt-2 py-1 text-uppercase border-0 btn btn-success reserve-btn">Reserve Now</button>
                    </form>
                    </div>

                  </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
          <div class="col-lg-8 border bg-white py-3 rounded">
            asdas
          </div>
          <div class="col-lg-4 bg-white py-3 px-5">
            <small><i>Like us on <a href="">facebook</a> to get updates on our latest promotions! <br>
              Subscibe us on <a href="" class="text-danger">youtube</a> to see our “behind the seams” updates!</i></small>
          </div>
        </div>
    </div>
@endsection