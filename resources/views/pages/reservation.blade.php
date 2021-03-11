@extends('layouts.app')
@section('content')
<div class="bg-light py-3">
    <div class="container-fluid my-4" style="padding-left: 60px; padding-right: 60px">
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
            <div class="col-lg-6 px-2">
                <div class="border rounded p-5 bg-white border-0 shadow-sm">
                    <div class="d-flex align-items-center">
                        <span class="mr-2 d-flex justify-content-center align-items-center text-white" style="border-radius: 50%; background-color: #50d487; width: 30px; height: 30px;"><i class="fas fa-exclamation"></i></span>
                        <h4 class="mb-0">Personal Information</h4>
                    </div>
                        <hr>
                <form action="{{ route('reserve.store') }}" method="POST" id="reservation-form">
                            @csrf
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="name">Full Name</label>
                                <input type="user_id" class="form-control shadow-sm" value="{{ auth()->user()->name }}" readonly>
                              </div>
                              <div class="form-group w-100 ml-2">
                                <label for="lname">Last name</label>
                                <input type="lname" class="form-control shadow-sm" readonly>
                              </div>
                        </div>
        
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control shadow-sm" required readonly>
                              </div>
                              <div class="form-group w-100 ml-2">
                                <label for="phone">Phone Number</label>
                                <input type="number" name="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control shadow-sm" maxlength="11" required>
                              </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="address">Home Address</label>
                                <input type="text" name="address" class="form-control shadow-sm text-dark" required>
                            </div>
                            <div class="form-group w-100 ml-2">
                                <label for="barangay">Barangay</label>
                                <input type="text" name="barangay" class="form-control shadow-sm">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control shadow-sm" required>
                              </div>
                              <div class="form-group w-100 mx-2">
                                <label for="province">Province</label>
                                <input type="text" name="province" class="form-control shadow-sm" required>
                              </div>
                              <div class="form-group w-100 ml-2">
                                <label for="postal">Postal Code</label>
                                <input type="text" name="postal" class="form-control shadow-sm" required>
                              </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-3 px-2">
                <div class="bg-white shadow-sm border-0 px-2 py-3">
                    <h5>Select Location</h5>
                    <select class="browser-default custom-select mb-4">
                    <option selected>Location</option>
                    <option value="1">Pampanga</option>
                    <option value="2">Manila</option>
                    <option value="3">Bulacan</option>
                    </select>
                    <h5>Select Schedule</h5>
                    <div class="pb-0">
                        <div class="my-2 text-muted">
                                {{-- <i id="calendar" class="far fa-calendar-alt pl-3 pr-2 py-2" style="color: #38c172;"></i> --}}
                                <input type="text" name="date" class="datepicker w-100" date-format='yy-mm-dd' placeholder="Date" style="border: none; outline: none" required>
                            
                            <div class="d-flex">
                                <div class="d-flex w-100 mr-1 my-2 align-items-center shadow-sm input-reserve" style="border: 1px solid #333">
                                <i class="far fa-clock pl-3 pr-2 py-2"></i>
                                <input type="text" name="time" class="timepicker w-100" placeholder="Start Time" style="border: none; outline: none" required>
                                </div>
                                <div class="d-flex ml-1 w-100 my-2 align-items-center shadow-sm input-reserve" style="border: 1px solid #333">
                                    <i class="far fa-clock pl-3 pr-2 py-2"></i>
                                    <input type="text" name="time" class="timepicker w-100" placeholder="End Time" style="border: none; outline: none" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-3 pb-5 pt-0 px-2">
                <div class="border-0 rounded bg-white shadow-sm">
                    <h5 class="text-center bg-dark text-white py-3">Reservation Overview</h5>
                        <div class="px-3 py-1">
                            <img src={{ asset('storage/'. $service->image) }} alt="" class="img-fluid rounded">
                            <input type="hidden" name="image" value="{{ $service->image }}">
                        </div>
                        <div class="px-3 py-1">
                            <table class="table table-hover table-bordered mb-1">
                                <tbody>
                                    <tr>
                                        <td>Services</td>
                                        <td>{{ $service->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Package</td>
                                        <td>{{ $service->details }}</td>
                                    </tr>
                                    <tr>
                                        <td>Guest</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>{{ $service->presentPrice() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td>Quezon City</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td><span id="date-val"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Time</td>
                                        <td>7:00 AM to 12:00PM</td>
                                    </tr>
                                </tbody>
                            </table>
                             <small class="text-center text-muted d-flex justify-content-center align-items-center py-1"><i class="fas fa-exclamation-circle pr-2 text-muted"></i>Please check your reservation details.</small>
                            <input type="hidden" name="name" value="{{ $service->name }}">
                            <input type="hidden" name="details" value="{{ $service->details }}">
                        </div>
                       
                    <div class="d-flex justify-content-between px-3 pt-2">
                        <h6 class="font-weight-bold">Total</h6>
                        <p class="font-weight-bold">{{ $service->presentPrice() }}</p>
                        <input type="hidden" name="price" value="{{ $service->price}}">
                    </div>
                    <div class="px-3 pb-3">
                        <button type="submit" class="btn btn-success text-white w-100 shadow-sm">Request to Book</button>
                        <a href="{{ route('services.show', $service->slug ) }}"><div class="btn w-100 mt-1 text-white shadow-sm" style="background-color: rgb(153, 152, 152)">Cancel</div></a>
                    </div>
                </div>
            </div>
    </form>
        </div>
    </div>
    </div>
@endsection