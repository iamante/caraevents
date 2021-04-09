@extends('layouts.app')
@section('content')
<img src="{{ asset('images/bg-confi.jpg')}}" alt="" class="img-fluid">
    <div style="background-color: #e6eaed">
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-md-8 mb-3">
                    <div class="row bg-white shadow-sm p-5">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/'. $car_rental->image)}}" alt="" class="img-fluid" width="400">
                        </div>
                        <div class="col-md-6 p-4">
                            <h4 class="text-dark font-weight-bolder">{{ $car_rental->car_name}}</h4>
                            <p class="mb-3 text-center rounded" style="width: 100px; color: rgb(74, 75, 75); background-color:rgb(242, 243, 243);">{{ $car_rental->transmission}}</p>
                            <p class="mb-0"><i class="fas fa-tint text-muted pr-2"></i> Color - {{ $car_rental->color }} </p>
                            <p class="mb-0"><i class="fas fa-user-tie text-muted pr-2"></i>{{ $car_rental->seats }}</p>
                        </div>
                        <div class="col mt-5">
                            <h5>Description</h5>
                            <p>{!! $car_rental->description !!}</p>
                            <div class="mt-5">
                                <h5>Caraevents Office</h5>
                                <p class="mb-1">Block 85 Lot 29A, Riyal Street, United North Park, Phase 8, Fairview Subdivision Quezon City</p>
                                <iframe class="img-fluid mt-3" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15436.703142064003!2d121.0565013!3d14.7026491!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcace75fb83bd1c1e!2sCara%20Events%20Philippines!5e0!3m2!1sen!2sph!4v1600268794813!5m2!1sen!2sph" width="1920" height="1920" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <form action="{{ route('reserve.car_index', $car_rental->slug )}}" method="POST">
                        @method('GET')
                        @csrf

                    <div class="card shadow-sm rounded-top border-bottom-0" style="border-radius: 0">
                        <div class="card-header bg-white font-weight-bold">
                            Pick-up location <span class="text-danger">*</span>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex">
                                    <i class="fas fa-map-marker-alt text-success mt-1 pr-2"></i>
                                    <label for="">Location</label>
                                </div>
                                <input type="text" name="pickup_location" class="form-control w-100" placeholder="Enter your desire location" required>
                            </div>
                            
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="w-100 mr-3">
                                    <div class="d-flex">
                                        <i class="fas fa-calendar-alt pt-1 pr-2 text-success"></i>
                                        <label for="">Start date</label>
                                    </div>
                                    <input type="text" name="start_date" class="car-start-datepicker form-control w-100" required>
                                </div>
                                <div class="">
                                    <div class="d-flex">
                                        <i class="fas fa-clock pt-1 pr-2 text-success"></i>
                                        <label for="">Start time</label>
                                    </div>
                                    <input type="text" name="start_time" class="car-start-timepicker form-control w-100" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    

                    <div class="card shadow-sm rounded-bottom border-top-0 mb-3" style="border-radius: 0">
                        <div class="card-header bg-white font-weight-bold">
                            Drop-off location <span class="text-danger">*</span>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex">
                                    <i class="fas fa-map-marker-alt text-success mt-1 pr-2"></i>
                                    <label for="">Location</label>
                                </div>
                                <input type="text" name="dropoff_location" class="form-control w-100" placeholder="Enter your desire location" required>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="w-100 mr-3">
                                    <div class="d-flex">
                                        <i class="fas fa-calendar-alt pt-1 pr-2 text-success"></i>
                                        <label for="">End date</label>
                                    </div>
                                    <input type="text" name="end_date" class="car-end-datepicker form-control w-100" required>
                                </div>
                                <div class="">
                                    <div class="d-flex">
                                        <i class="fas fa-clock pt-1 pr-2 text-success"></i>
                                        <label for="">End time</label>
                                    </div>
                                    <input type="text" name="end_time" class="car-end-timepicker form-control w-100" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 font-weight-bold">Rental Summary</h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-5">
                                    <img src="{{ asset('storage/'. $car_rental->image )}}" alt="" class="img-fluid" width="150">
                                </div>
                                <div class="col-7 pl-0">
                                    <ul class="list-unstyled">
                                        <li>{{ $car_rental->car_name }}</li>
                                        <li>{{ $car_rental->transmission }}</li>
                                        <li>Color - {{ $car_rental->color }}</li>
                                        <li>{{ $car_rental->seats }}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between px-2">
                                <p class="font-weight-bold">Total</p>
                                <h3 class="font-weight-bold" style="color: #1A8A8A">{{ $car_rental->presentPrice() }}</h3>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success w-100 border-radius">
                                Continue
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-8 border-0 shadow-sm py-3 bg-white rounded">
                    @if ($car_rental->comments->count() == 0)
                    @else
                        <p class="bg-light p-3">Comments {{ $car_rental->comments->count() }}</p>
                    @endif
                        @comments(['model' => $car_rental])
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

@section('extra-js')
    
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script>
        $(function(){
            var today = new Date();
            var dd = String(today.getDate() + 1).padStart(2, "0");
            var mm = String(today.getMonth() + 1).padStart(2, "0");
            var yyyy = today.getFullYear();

            var todayDate = yyyy + "-" + mm + "-" + dd;

            var expireDate = new Date(todayDate);
            expireDate.setFullYear(expireDate.getFullYear() + 1);
            expireDate.setDate(expireDate.getDate() - 1);
            var expiredDate =
                expireDate.toLocaleString("en", { year: "numeric" }) +
                "-" +
                expireDate.toLocaleString("en", { month: "numeric" }) +
                "-" +
                expireDate.toLocaleString("en", { day: "numeric" });


            $(".car-start-datepicker").datetimepicker({
                timepicker: false,
                todayButton: false,
                format: "Y-m-d",
                formatDate: "Y-m-d",
                minDate: todayDate,
                maxDate: expiredDate,
            });

            $(".car-start-timepicker").datetimepicker({
                datepicker: false,
                ampm: true,
                formatTime: "g:i A",
                format: "g:i A",
                validateOnBlur: false,
                minTime: "8:00",
                maxTime: "23:00",
            });


            $(".car-end-datepicker").datetimepicker({
                timepicker: false,
                todayButton: false,
                format: "Y-m-d",
                formatDate: "Y-m-d",
                minDate: todayDate,
                maxDate: expiredDate,
            });

            $(".car-end-timepicker").datetimepicker({
                datepicker: false,
                ampm: true,
                formatTime: "g:i A",
                format: "g:i A",
                validateOnBlur: false,
                minTime: "8:00",
                maxTime: "23:00",
            });


        });
    </script>
@endsection