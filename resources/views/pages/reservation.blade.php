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
            <div class="col-lg-6 px-2 ">
                <div class="d-flex align-items-center bg-dark text-white py-3 pl-4">
                    <i class="fa fa-exclamation-circle px-2"></i>
                    <h5 class="mb-0">Personal Information</h5>
                </div>
                <div class="border rounded p-4 bg-white border-0 shadow-sm">
                <form action="{{ route('reserve.store') }}" method="POST" id="reservation-form">
                            @csrf
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="customer_name">Full Name</label>
                                <input type="text" name="customer_name" class="form-control shadow-sm" value="{{ auth()->user()->name }}" readonly>
                                
                              </div>
                              <div class="form-group w-100 ml-2">
                                <label for="customer_lname">Last name</label>
                                <input type="text" name="customer_lname" class="form-control shadow-sm">
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
                                <input type="text" name="barangay" class="form-control shadow-sm" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control shadow-sm" required>
                              </div>
                              <div class="form-group w-100 mx-2">
                                <label for="province">State/Province</label>
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
                <h5 class="bg-dark text-white py-3 pl-4">Schedule</h5>
                <div class="bg-white shadow-sm border-0 px-2 py-3">
                    <h5 class="pl-2">Select Location</h5>
                    <select class="browser-default custom-select mb-4">
                    <option selected>Location</option>
                    <option value="1">Pampanga</option>
                    <option value="2">Manila</option>
                    <option value="3">Bulacan</option>
                    </select>
                    <h5 class="pl-2">Select Date</h5>
                    <div class="pb-0">
                        <div class="my-2">
                            <input type="text" name="date" class="datepicker w-100" date-format='yy-mm-dd' placeholder="Date" style="border: none; outline: none">
                            <div class="d-flex">
                                <div class="w-100 mr-1 my-2">
                                    <p class="text-center mb-0">Start time</p>
                                <input type="text" name="start_time" class="timepicker1 w-100" placeholder="Start Time" style="border: none; outline: none">
                                </div>
                                <div class="ml-1 w-100 my-2">
                                    <p class="text-center mb-0">End time</p>
                                    <input type="text" name="end_time" class="timepicker2 w-100" placeholder="End Time" style="border: none; outline: none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-3 pb-5 pt-0 px-2">
                <div class="border-0 rounded bg-white shadow-sm">
                    <h5 class="bg-dark text-white py-3 pl-4">Reservation Overview</h5>
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
                                        <td><span id="time1-val"></span> - <span id="time2-val"></span></td>
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
                        <div class="error text-danger text-center px-3 pb-3">
                            <i></i>
                        </div>
                        <div class="px-3 pb-3">
                            <button type="submit" id="reserve-btn" class="btn btn-success text-white w-100 shadow-sm">Request to Book</button>
                            <a href="{{ route('services.show', $service->slug ) }}"><div class="btn w-100 mt-1 text-white shadow-sm" style="background-color: rgb(153, 152, 152)">Cancel</div></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    {{-- <script src="{{ asset('js/datepicker.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/datepicker.js') }}"></script>
    <script src="{{ asset('build/jquery.datetimepicker.full.min.js')}}"></script>
    <script>
        let dates = {!! collect($reservation) !!};
    </script>

@endsection