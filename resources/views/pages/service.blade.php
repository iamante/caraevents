@extends('layouts.app')
@section('content')
<img src={{ asset('storage/'. $service->image) }} alt="" style="object-fit: cover; max-height: 400px; width: 100%">
<div class="bg-light">
  <div class="container pb-5 pt-3">
        <div class="row pt-3 mb-4">
            <div class="col-lg-8 border-0 rounded shadow-sm bg-white px-0 mb-4">
              <div class="px-5 pt-5 pb-4">
                @component('components.breadcrumbs')
                  <a href="/" style="font-size: 12px;" class="text-dark">Home</a>
                  <i class="fa fa-chevron-right breadcrumb-separator px-2 text-dark"  style="font-size: 12px"></i>
                  <span><a href="{{ route('services.index') }}"  style="font-size: 12px" class=" text-dark">Services</a></span>
                  <i class="fa fa-chevron-right breadcrumb-separator px-2 text-dark"  style="font-size: 12px"></i>
                  <span class="text-muted"  style="font-size: 12px">{{ $service->name }}</span>
                @endcomponent
                <h1 class=" font-weight-bold" style="letter-spacing: 2px;">{{ $service->name }}</h1>
                <h6 class="mb-0 font-weight-bold" style="padding-top:3px; padding-bottom:3px; text-transform: uppercase; color:azure; background-color:#38c172; width: 120px; text-align:center"><i class="fas fa-box-open" style="font-size: 12px;"></i> {{ $service->details }}</h6>
              </div>
              <hr>
                <div class="px-5 py-3">
                  <h5 class="font-weight-bold text-dark">About this Service</h5>
                    <p class="pl-5 text-dark">{!! $service->description !!}</p>
                    {{-- <details>
                    <summary>Menus</summary>
                    <p>The arrangement of type involves the selection of typefaces, point size, line length, leading (line spacing), adjusting the spaces between groups of letters (tracking) and adjusting the space between pairs of letters (kerning).</p>
                    </details> --}}
                    <div class="mt-5">
                        <h5>Caraevents Office</h5>
                        <p class="mb-1">Block 85 Lot 29A, Riyal Street, United North Park, Phase 8, Fairview Subdivision Quezon City</p>
                        <iframe class="img-fluid mt-3" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15436.703142064003!2d121.0565013!3d14.7026491!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcace75fb83bd1c1e!2sCara%20Events%20Philippines!5e0!3m2!1sen!2sph!4v1600268794813!5m2!1sen!2sph" width="1920" height="1920" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="container">
                  <div class="card shadow border-0">
                    <div class="card-body p-0">
                        <div class="bg-dark p-4">
                          <h5 class="mb-0 font-weight-bold text-white">{{ $service->name }}</h5>
                          <span class="text-uppercase text-white">({{ $service->details }})</span>
                        </div>
                        
                        <form action="{{ route('reserve.index', $service->slug )}}" method="POST">
                          @method('GET')
                          @csrf

                        <div class="p-4">

                          <div class="form-group mb-4" style="border-bottom: 1px solid #ced4da; border-radius: 0">
                            <small class="text-dark">
                            <label for="" class="mb-0">Guest</label></small>
                            <div class="d-flex align-items-center">
                              <input type="text" name="guests" class="form-control pl-0 pt-0 bg-white border-0" value="{{ $service->guests}}" readonly>
                            </div>
                          </div>
                          
                          <div class="form-group mb-4" style="border-bottom: 1px solid #ced4da; border-radius: 0">

                              <div class="d-flex align-items-center">
                                <button type="button" class="bg-white border-0 text-primary" data-toggle="modal" data-target="#exampleModal">
                                      <small class="text-dark pr-1">Menus</small>
                                      <i class="fas fa-concierge-bell text-white bg-info rounded p-1"></i>
                                </button>
                              </div>
                                

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-xl">
                                  <div class="modal-content">
                                      {{-- <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Menus</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div> --}}
                                      <div class="modal-body">
                                          <img src="{{ asset('storage/'. $service->menu_image) }}" alt="menu" class="img-fluid">
                                      </div>
                                  </div>
                              </div>
                            </div>


                            <div class="d-flex align-items-center">
                              <select id="service-menu" name="menu" class="browser-default custom-select border-0 pl-0">
                                <option value="1" selected class="p-3">Menu No.1</option>
                                {{-- <option value="1" disabled>&nbsp;&nbsp;&nbsp;Menudo</option>
                                <option value="1" disabled>&nbsp;&nbsp;&nbsp;Mechado</option>
                                <option value="1" disabled>&nbsp;&nbsp;&nbsp;Caldereta</option> --}}
                                <option value="2">Menu No.2</option>
                                <option value="3">Menu No.3</option>
                              </select>
                            </div>
                          </div>

                          {{-- <div class="d-flex align-items-center ml-1 mt-2 mb-4">
                            <i class="fas fa-exclamation-circle pr-1 text-muted" style="font-size: 10px;"></i>
                            <small class="text-danger">Click the menu icon to see what's in the menu</small>
                          </div> --}}

                          <div class="form-group" style="border-bottom: 1px solid #ced4da; border-radius: 0">
                            <small class="text-dark">
                            <label for="" class="mb-0">Location</label></small>
                            <div id="default-suggestions" class="d-flex align-items-cente border-0">
                              <input type="text" name="location" class="typeahead form-control pl-0 pt-0 border-0 w-100" placeholder="Enter your desire location" required>
                            </div>
                          </div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 text-right">Total</p> 
                            <p class="mb-0 text-right py-2"><span class="pl-2" style="font-weight: 800; font-size: 30px; color: #1a8a8a">{{ $service->presentPrice() }}</span> </p>
                          </div>
                          
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

   