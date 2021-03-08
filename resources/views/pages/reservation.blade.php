@extends('layouts.app')
@section('content')
@include('include.navigation')
    <div class="bg-light py-3">

    <div class="container my-4">
        <div class="d-flex align-items-center rounded my-3 py-2" style="font-weight: 900;background-color: #67d896; color: #fff;border: 1px solid #38c172;">
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
                        <span class="mr-2 d-flex justify-content-center align-items-center text-white" style="border-radius: 50%; background-color: #50d487; width: 30px; height: 30px;"><i class="fas fa-exclamation"></i></span>
                        <h4 class="mb-0">Reservation</h4>
                    </div>
                        <hr>
                <form action="{{ route('reserve.store') }}" method="POST" id="reservation-form">
                            @csrf
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="name">Full Name</label>
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
                                <input type="number" name="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="11" required>
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
        
            <div class="col-lg-5 pb-5 pt-0">
                <div class="border rounded mx-3 bg-white">
                    <h5 class="text-center bg-dark text-white py-3">Reservation Details</h5>
                    <div class="row px-4 pt-3">
                        <div class="col-6">
                            <img src={{ asset('storage/'. $service->image) }} alt="" class="img-fluid rounded">
                            <input type="hidden" name="image" value="{{ $service->image }}">
                        </div>
                        <div class="col-6 pl-1">
                            <input type="hidden" name="name" value="{{ $service->name }}">
                            <input type="hidden" name="details" value="{{ $service->details }}">
                            <h4 class="font-weight-bold">{{ $service->name }}</h4>
                            <h5 class="text-muted mb-1">{{ $service->details }}</h5>
                            <p class="text-muted mb-0">Pax 30 <i class="fa fa-users" style="color: #38c172;"></i></p>
                            <p class="mb-0"><span style="font-weight: 800">{{ $service->presentPrice() }}.00</span></p>
                        </div>
                    </div>
                    <p class="pl-4 pt-3 pb-1 mb-0 text-center">Reservation Date</p>
                    <div class="d-flex justify-content-between px-4 pb-0">
                        <div class="d-flex my-2 text-muted">
                            <div class="d-flex w-50 mr-1 align-items-center border rounded">
                              <i id="calendar" class="far fa-calendar-alt pl-3 pr-2 py-2" style="color: #38c172;"></i>
                              <input type="text" name="date" class="datepicker w-100" date-format='yy-mm-dd' placeholder="Date" style="border: none; outline: none" required>
                            </div>
                            <div class="d-flex w-50 ml-1 align-items-center border rounded">
                              <i class="far fa-clock pl-3 pr-2 py-2" style="color: #38c172;"></i>
                              <input type="text" name="time" class="timepicker w-100" placeholder="Time" style="border: none; outline: none" required>
                            </div>
                        </div>
                    </div>   
                    
                    <div class="px-4 pb-3 pt-0">
                        <ul class="list-unstyled border w-100 p-2">
                            <li><i class="fas fa-users pr-2"></i>30 Guest</li>
                            <li><i class="fas fa-volume-up pr-2"></i>Basic Sound System</li>
                            <li><i class="fas fa-utensils pr-2"></i>Menu No.1</li>
                            <li><i class="fas  fa-birthday-cake pr-2"></i>Wedding Cake</li>
                            <li><i class="fas fa-users pr-2"></i>Free Aircon Venue</li>
                        </ul>
                    </div> 
                    <div class="d-flex justify-content-between px-4">
                        <h6 class="font-weight-bold">Total</h6>
                        <p class="font-weight-bold">{{ $service->presentPrice() }}</p>
                        <input type="hidden" name="price" value="{{ $service->price}}">
                    </div>
                    <div class="px-4 pb-3">
                        <button type="submit" class="btn btn-success text-white w-100">Request to Book</button>
                        <a href="{{ route('services.show', $service->slug ) }}"><div class="btn w-100 mt-1 text-white" style="background-color: rgb(153, 152, 152)">Cancel</div></a>
                    </div>
                </div>
            </div>
    </form>
        </div>
    </div>
    </div>
@endsection