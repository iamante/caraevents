@extends('layouts.app')
@section('content')
@include('include.navigation')
    <div class="container my-4">
        <div class="d-flex align-items-center rounded my-3 py-2" style="font-weight: 900;background-color: rgb(215, 235, 243);color: rgb(47, 132, 243);border: 1px solid rgb(47, 131, 241);">
            <i class="far fa-clock px-3 py-2"></i>
            <span>Enjoy and Reserve with Confidence</span>
        </div>
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message')}}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row ">
            <div class="col-lg-7 ">
            
                <div class="border rounded p-5 bg-white">
                    <div class="d-flex align-items-center">
                        <span class="mr-2 d-flex justify-content-center align-items-center text-white" style="border-radius: 50%; background-color: rgb(230, 75, 75); width: 30px; height: 30px;">1</span>
                        <h4 class="mb-0">Reservation</h4>
                    </div>
                        <hr>
                <form action="{{ route('reserve.store') }}" method="POST">
                            @csrf
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="name">Name</label>
                                <input type="user_id" class="form-control" value="{{ auth()->user()->name }}" readonly>
                              </div>
                              <!-- <div class="form-group w-100 ml-2">
                                <label for="name">Last name</label>
                                <input type="name" class="form-control" readonly>
                              </div> -->
                        </div>
        
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" required readonly>
                              </div>
                              <div class="form-group w-100 ml-2">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" class="form-control" required>
                              </div>
                        </div>
                        <div class="form-group w-100">
                            <label for="address">Your Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control" required>
                              </div>
                              <div class="form-group w-100 mx-2">
                                <label for="province">Province</label>
                                <input type="text" name="province" class="form-control" required>
                              </div>
                              <div class="form-group w-100 ml-2">
                                <label for="postal">Postal Code</label>
                                <input type="text" name="postal" class="form-control" required>
                              </div>
                        </div>
                </div>
            </div>
        
            <div class="col-lg-5 pb-5 pr-5 pl-5 pt-0">
                <div class="border rounded p-4 bg-white">
                    <div class="row px-3">
                        <div class="col-6">
                            <input type="hidden" name="name" value="{{ $service->name }}">
                            <input type="hidden" name="details" value="{{ $service->details }}">
                            <h4 class="font-weight-bold">{{ $service->name }}</h4>
                            <h5 class="font-weight-bold text-muted">{{ $service->details }}</h5>
                        </div>
                        <div class="col-6">
                            <img src={{ asset('storage/'. $service->image) }} alt="" class="img-fluid rounded">
                            <input type="hidden" name="image" value="{{ $service->image }}">
                        </div>
                    </div>
                    <p class="text-center pt-3 pb-1 mb-0">Expected Date</p>
                    <div class="d-flex justify-content-between pl-3 pr-3 pb-0">
                        <div class="d-flex my-2 text-muted">
                            <div class="d-flex w-50 mr-1 align-items-center border rounded">
                              <i id="calendar" class="far fa-calendar pl-3 pr-1 py-2"></i>
                              <input type="text" name="date" class="datepicker w-100" data-date-format='yy-mm-dd' placeholder="Date" style="border: none" required>
                            </div>
                            <div class="d-flex w-50 ml-1 align-items-center border rounded">
                              <i class="far fa-clock pl-3 pr-1 py-2"></i>
                              <input type="text" name="time" class="timepicker w-100" placeholder="Time" style="border: none" required>
                            </div>
                          </div>
                    </div>
                    <div class="pl-3 pr-3 pb-3 pt-0">
                        <ul class="list-unstyled border w-100 p-2" style="background-color: rgb(240, 226, 226)">
                            <li><i class="fas fa-users pr-2"></i>30 Guest</li>
                            <li><i class="fas fa-volume-up pr-2"></i>Basic Sound System</li>
                            <li><i class="fas fa-utensils pr-2"></i>Menu No.1</li>
                            <li><i class="fas  fa-birthday-cake pr-2"></i>Wedding Cake</li>
                            <li><i class="fas fa-users pr-2"></i>Free Aircon Venue</li>
                        </ul>
                    </div>    
                    <div class="d-flex justify-content-between px-3">
                        <h6 class="font-weight-bold">Total</h6>
                        <p class="font-weight-bold">{{ $service->presentPrice() }}</p>
                        <input type="hidden" name="price" value="{{ $service->price}}">
                    </div>
                    <div class="px-3">
                        <button type="submit" class="btn btn-success w-100">Proceed</button>
                        <a href="{{ route('services.show', $service->slug ) }}"><div class="btn btn-dark w-100 mt-2">Cancel</div></a>
                    </div>
                </div>
            </div>
    </form>
        </div>
    </div>
@endsection