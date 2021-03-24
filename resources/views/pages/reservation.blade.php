@extends('layouts.app')
@section('content')
<div class="bg-light py-3">
    <div class="container my-5 py-5">
        {{-- <div class="d-flex align-items-center rounded my-3 py-2" style="font-weight: 900;background-color: #67d896; color: #fff;border: 1px solid #38c172;">
            <i class="far fa-clock px-3 py-2"></i>
            <span>Enjoy and Reserve with Confidence</span>
        </div> --}}
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
                <span class="step d-flex align-items-center justify-content-center text-white"><i class="fas fa-users" aria-hidden="true"></i></span>
                <span class="step d-flex align-items-center justify-content-center text-white"><i class="fas fa-calendar-alt" aria-hidden="true"></i></span>
                <span class="last-step d-flex align-items-center justify-content-center text-white"><i class="fas fa-check"></i></span>
            </div>

            <form id="reservation-form" action="{{ route('reserve.store') }}" method="POST" class="g-3 needs-validation">
                @csrf

                <div class="row tab mb-3">
                    <div class="col-md-8 mb-3 bg-white shadow-sm px-5 pt-4">

                        <div class="mb-5 text-center">
                            <h4 class="text-success"><i class="fa fa-user-friends mr-1"></i> Personal Information</h4>
                            <small>Fill up the information below to proceed.</small>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="customer_name">First Name</label>
                                <input type="text" name="customer_name" class="form-control shadow-sm" value="{{ auth()->user()->name }}" placeholder="First Name" readonly>
                            </div>

                            <div class="form-group w-100 ml-2">
                                <label for="customer_lname">Last Name</label>
                                <input type="text" name="customer_lname" class="form-control shadow-sm" placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control shadow-sm" required readonly>
                            </div>

                            <div class="form-group w-100 ml-2">
                                <label for="phone">Phone Number <span class="text-danger">*</span></label>
                                <input type="number" name="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control shadow-sm" maxlength="11" required>
                                <div class="invalid-feedback text-center">
                                    Please input your phone number.
                                </div>
                            </div>
                        </div>


                        <div class="d-flex justify-content-between">
                            <div class="form-floating w-100 mr-2">
                                <label for="address">Home Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control shadow-sm text-dark" placeholder="Home address" required>
                                <div class="invalid-feedback text-center">
                                    Please input your address.
                                </div>
                            </div>
                            <div class="form-group w-100 ml-2">
                                <label for="barangay">Barangay <span class="text-danger">*</span></label>
                                <input type="text" name="barangay" class="form-control shadow-sm" required>
                                <div class="invalid-feedback text-center">
                                    Please input your barangay.
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <label for="city">City <span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control shadow-sm" required>
                                <div class="invalid-feedback text-center">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="form-group w-100 mx-2">
                                <label for="province">State/Province <span class="text-danger">*</span></label>
                                <input type="text" name="province" class="form-control shadow-sm" required>
                                <div class="invalid-feedback text-center">
                                    Please provide a valid state/province.
                                </div>
                            </div>
                            <div class="form-group w-100 ml-2">
                                <label for="postal">Zip Code <span class="text-danger">*</span></label>
                                <input type="text" name="postal" class="form-control shadow-sm" required>
                                <div class="invalid-feedback text-center">
                                    Please provide a valid zipcode.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 mb-3 bg-white shadow-sm px-5 pt-4">
                        <h5 class="mb-4 text-success text-center"><i class="fa fa-clipboard-list mr-1" aria-hidden="true"></i> Reservation Overview</h5>
                        
                        <div class="mb-3">
                            <img src={{ asset('storage/'. $service->image) }} alt="" class="img-fluid rounded">
                            <input type="hidden" name="image" value="{{ $service->image }}">
                        </div>

                        <div>
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
                                </tbody>
                            </table>
                            <small class="text-center text-muted d-flex justify-content-center align-items-center py-1"><i class="fas fa-exclamation-circle pr-2 text-muted"></i>Please check your reservation details.</small>
                            <input type="hidden" name="name" value="{{ $service->name }}">
                            <input type="hidden" name="details" value="{{ $service->details }}">
                        </div>
                            
                        <div class="d-flex justify-content-between pt-2">
                            <h6 class="font-weight-bold">Total</h6>
                            <p class="font-weight-bold">{{ $service->presentPrice() }}</p>
                            <input type="hidden" name="price" value="{{ $service->price}}">
                        </div>

                    </div>
                </div>

                <div class="row tab mb-3">

                    <div class="col-md-5 mb-3 bg-white shadow-sm px-3 pt-4">
                        <h5 class="mb-3 text-center text-success"><i class="fa fa-calendar-alt mr-1"></i> Schedule Date</h5>
                        <div class="pb-0">
                            <div class="my-2 d-flex">
                                <input type="text" name="date" class="datepicker w-100" date-format='yy-mm-dd' placeholder="Date" style="border: none; outline: none">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 bg-white shadow-sm px-3 pt-4">

                        <h5 class="mb-3 text-center text-success"><i class="fa fa-clock mr-1"></i> Schedule Date</h5>
                        <div class="d-flex">
                            <div class="w-100 mr-1 my-2">
                                <p class="text-center mb-3">Start time</p>
                            <input type="text" name="start_time" class="timepicker1 w-100" placeholder="Start Time" style="border: none; outline: none">
                            </div>
                            <div class="ml-1 w-100 my-2">
                                <p class="text-center mb-3">End time</p>
                                <input type="text" name="end_time" class="timepicker2 w-100" placeholder="End Time" style="border: none; outline: none">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3 bg-white shadow-sm px-3 pt-4">

                        <h5 class="mb-3 text-center text-success"><i class="fa fa-clipboard-list" aria-hidden="true"></i> Reservation Overview</h5>
                        
                        <div class="mb-3">
                            <img src={{ asset('storage/'. $service->image) }} alt="" class="img-fluid rounded">
                            <input type="hidden" name="image" value="{{ $service->image }}">
                        </div>

                        <div>
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
                            
                        <div class="d-flex justify-content-between pt-2">
                            <h6 class="font-weight-bold">Total</h6>
                            <p class="font-weight-bold">{{ $service->presentPrice() }}</p>
                            <input type="hidden" name="price" value="{{ $service->price}}">
                        </div>

                    </div>
                </div>

                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="nextBtn" class="btn btn-success text-white w-100 mb-2 float-right" onclick="nextPrev(1)">Proceed</button>
                            <button type="button" id="prevBtn" class="btn btn-dark text-white w-100 mb-2 float-right" onclick="nextPrev(-1)">Back</button>
                            <a href="{{ route('services.show', $service->slug ) }}"><button type="button" id="cancelBtn" class="btn btn-dark text-white w-100 mb-2 float-right">Cancel</button></a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    {{-- <script src="{{ asset('js/datepicker.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/datepicker.js') }}"></script>
    <script src="{{ asset('build/jquery.datetimepicker.full.min.js')}}"></script>
    <script>
        let dates = {!! collect($reservation) !!};
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "flex";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("cancelBtn").style.display = "block";
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }

        if (n >= 1) {
            document.getElementById("cancelBtn").style.display = "none";
        }

        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Request to Book";
        } else {
            document.getElementById("nextBtn").innerHTML = "Proceed";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
        }



        function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) {
            document.getElementById("reservation-form").classList.add('was-validated');
            return false;
        }
        // Hide the current tab:
        x[0].style.display = "none";

        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("reservation-form").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }

        function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        
        return valid; // return the valid status
        }

        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
        }
    </script>

@endsection