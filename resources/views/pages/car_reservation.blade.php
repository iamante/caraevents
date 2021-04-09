@extends('layouts.app')
@section('content')
<div class="py-3" style="background-color: #e6eaed">
    <div class="container my-5 py-5 car-reserve">
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
                        
            <!-- Circles which indicates the steps of the form: -->
            <div class="mb-5 d-flex align-items-center justify-content-center">
                <span class="step d-flex align-items-center justify-content-center text-white" style="opacity: 1"><i class="fas fa-users" aria-hidden="true"></i></span>
                <span class="last-step d-flex align-items-center justify-content-center text-white"><i class="fas fa-check"></i></span>
            </div>

            <form id="reservation-form" action="{{ route('reserve.car_store')}}" method="POST" class="g-3 needs-validation">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-8 mb-3 bg-white shadow p-5">

                        <div class="mb-4">
                            <h5 class="mb-0">Personal Information</h5>
                            <small>Fill up the information below to proceed.</small>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="customer_name">First Name</label>
                                <input type="text" name="customer_fname" class="form-control shadow-sm rounded-0" value="{{ auth()->user()->name }}" placeholder="First Name" readonly>
                            </div>

                            <div class="form-group w-100 ml-2">
                                <label for="customer_lname">Last Name</label>
                                <input type="text" name="customer_lname" class="form-control rounded-0 " required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control rounded-0 rounded-0" required readonly>
                            </div>

                            <div class="form-group w-100 ml-2">
                                <label for="phone">Phone Number <span class="text-danger">*</span></label>
                                <input type="number" name="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control rounded-0" maxlength="11" required>
                                <div class="invalid-feedback text-center">
                                    Please input your phone number.
                                </div>
                            </div>
                        </div>


                        <div class="d-flex justify-content-between">
                            <div class="form-floating w-100 mr-2">
                                <label for="address">Home Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control rounded-0 text-dark" placeholder="Home address" required>
                                <div class="invalid-feedback text-center">
                                    Please input your address.
                                </div>
                            </div>
                            <div class="form-group w-100 ml-2">
                                <label for="barangay">Barangay <span class="text-danger">*</span></label>
                                <input type="text" name="barangay" class="form-control rounded-0" required>
                                <div class="invalid-feedback text-center">
                                    Please input your barangay.
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="city">City <span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control rounded-0" required>
                                <div class="invalid-feedback text-center">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="form-group w-100 mx-2">
                                <label for="province">State/Province <span class="text-danger">*</span></label>
                                <input type="text" name="province" class="form-control rounded-0" required>
                                <div class="invalid-feedback text-center">
                                    Please provide a valid state/province.
                                </div>
                            </div>
                            <div class="form-group w-100 ml-2">
                                <label for="postal">Zip Code <span class="text-danger">*</span></label>
                                <input type="text" name="postal" class="form-control rounded-0" required>
                                <div class="invalid-feedback text-center">
                                    Please provide a valid zipcode.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 mb-3">
                        
                        <div class="card bg-white shadow">
                            <div class="card-header">
                                <h6 class="mb-0">Reservation Overview</h6>
                            </div>
                            <div class="card-body p-4">
                                    <div class="mb-4">
                                        <img src="{{ asset('storage/'. $car_rental->image) }}" alt="car" class="img-fluid rounded">
                                        <input type="hidden" name="image" value="{{ $car_rental->image }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-weight-bolder">Summary</p>
                                        </div>
                                        <div class="col-8">
                                            <ul class="list-unstyled text-dark">
                                                <li>{{ $car_rental->car_name }}</li>
                                                <li>{{ $car_rental->transmission }}</li>
                                                <li>Color {{ $car_rental->color }}</li>
                                                <li>{{ $car_rental->seats }}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-weight-bolder">Pickup</p>
                                        </div>
                                        <div class="col-8">
                                            <ul class="list-unstyled">
                                                <li>{{ request()->pickup_location }}</li>
                                                <li>{{ request()->start_date }} - {{ request()->start_time }}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-weight-bolder">Dropoff</p>
                                        </div>
                                        <div class="col-8">
                                            <ul class="list-unstyled">
                                                <li>{{ request()->dropoff_location }}</li>
                                                <li>{{ request()->end_date }} - {{ request()->end_time }}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <p class="font-weight-bold">Total</p>
                                        </div>
                                        <div class="col-8">
                                            <ul class="list-unstyled">
                                                <li>{{ $car_rental->presentPrice()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                        
                                    <small class="mb-2 text-center text-muted d-flex justify-content-center align-items-center py-1"><i class="fas fa-exclamation-circle pr-2 text-muted"></i>Please check your reservation details.</small>
                                    <input type="hidden" name="user_id" value="{{ $car_rental->id }}">
                                    <input type="hidden" name="car_name" value="{{ $car_rental->car_name }}">
                                    <input type="hidden" name="transmission" value="{{ $car_rental->transmission }}">
                                    <input type="hidden" name="color" value="{{ $car_rental->color }}">
                                    <input type="hidden" name="seats" value="{{ $car_rental->seats }}">
                                    <input type="hidden" name="pickup_location" value="{{ request()->pickup_location }}">
                                    <input type="hidden" name="dropoff_location" value="{{ request()->dropoff_location }}">
                                    <input type="hidden" name="start_date" value="{{ request()->start_date }}">
                                    <input type="hidden" name="start_time" value="{{ request()->start_time }}">
                                    <input type="hidden" name="end_date" value="{{ request()->end_date }}">
                                    <input type="hidden" name="end_time" value="{{ request()->end_time }}">
                                    <input type="hidden" name="price" value="{{ $car_rental->price }}">

                                    <button type="submit" id="nextBtn" class="btn btn-success text-white w-100 mb-2 float-right" onclick="">Reserve Now</button>
                                    <a href="{{ route('car-rental.show', $car_rental->slug ) }}"><button type="button" id="cancelBtn" class="btn btn-dark text-white w-100 mb-2 float-right">Cancel</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection