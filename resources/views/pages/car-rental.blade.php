@extends('layouts.app')
@section('content')
<img src="{{ asset('images/bg-confi.jpg')}}" alt="" class="img-fluid">
    <div style="background-color: #e6eaed">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm border-bottom-0" style="margin-left: 100px">
                        <div class="card-header bg-white">
                            <h6 class="mb-0">Transmission</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="form-check mt-3 mb-4 ml-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    All
                                </label>
                            </div>
                            <div class="form-check mb-4 ml-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                Automatic
                                </label>
                            </div>
                            <div class="form-check mb-4 ml-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Manual
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-top-0" style="margin-left: 100px">
                        <div class="card-header bg-white">
                            <h6 class="mb-0">Passenger Capacity</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="form-check mt-3 mb-4 ml-4">
                                <input class="form-check-input" type="radio" name="flexRadio" id="flexRadio1" checked>
                                <label class="form-check-label" for="flexRadio1">
                                    4
                                </label>
                            </div>
                            <div class="form-check mb-4 ml-4">
                                <input class="form-check-input" type="radio" name="flexRadio" id="flexRadio2">
                                <label class="form-check-label" for="flexRadio2">
                                    5 - 6
                                </label>
                            </div>
                            <div class="form-check mb-4 ml-4">
                                <input class="form-check-input" type="radio" name="flexRadio" id="flexRadio2">
                                <label class="form-check-label" for="flexRadio2">
                                    6 >
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row bg-white mb-3 shadow-sm py-4 pl-5 pr-3">
                        <div class="col-md-4 py-3 d-flex justify-content-center">
                            <img src="{{ asset('images/rent/car-hyundai.png')}}" alt="" class="img-fluid" width="200">
                            
                        </div>
                        <div class="col-md-8 my-3 d-flex justify-content-between">
                            <div>
                                <h4 class="text-dark font-weight-bolder">Hyundai Accent 2019</h4>
                                <p class="mb-3 text-center rounded" style="width: 100px; color: rgb(74, 75, 75); background-color:rgb(242, 243, 243);">Automatic</p>
                                <p class="mb-0"><i class="fas fa-tint text-muted pr-2"></i> Color - White</p>
                                <p class="mb-0"><i class="fas fa-user-tie text-muted pr-2"></i>4 seats</p>
                            </div>
                            <div class="align-items-end d-flex flex-column">
                                <small class="mt-auto">Price rentals from</small>
                                <h3 class="text-right mb-0 font-weight-bold text-success">P3,500<small class="text-muted">/ day</small></h3>
                                <small class="mb-2 text-dark">Around Quezon City</small>
                                <div class="btn btn-success text-center px-5 rounded">Rent</div>
                            </div>
                        </div>
                    </div>

                    <div class="row bg-white shadow-sm py-4 pl-5 pr-3">
                        <div class="col-md-4 py-3 d-flex justify-content-center">
                            <img src="{{ asset('images/rent/van.png')}}" alt="" class="img-fluid" width="200">
                            
                        </div>
                        <div class="col-md-8 my-3 d-flex justify-content-between">
                            <div>
                                <h4 class="text-dark font-weight-bolder">Wedding Van</h4>
                                <p class="mb-3 text-center rounded" style="width: 100px; color: rgb(74, 75, 75); background-color:rgb(242, 243, 243);">Automatic</p>
                                <p class="mb-0"><i class="fas fa-tint text-muted pr-2"></i> Color - White</p>
                                <p class="mb-0"><i class="fas fa-user-tie text-muted pr-2"></i> 15 seats</p>
                            </div>
                            <div class="align-items-end d-flex flex-column">
                                <small class="mt-auto">Price rentals from</small>
                                <h3 class="text-right mb-0 font-weight-bold  text-success">P5,500<small class="text-muted">/ day</small></h3>
                                <small class="mb-2 text-dark">Around Quezon City</small>
                                <div class="btn btn-success text-center px-5 rounded">Rent</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection