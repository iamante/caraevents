@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-light py-5">

        <!-- Circles which indicates the steps of the form: -->
        <div class="mb-5 d-flex align-items-center justify-content-center">
            <span class="thankyou-step d-flex align-items-center justify-content-center text-white"><i class="fas fa-users" aria-hidden="true"></i></span>
            <span class="thankyou-step d-flex align-items-center justify-content-center text-white"><i class="fas fa-calendar-alt" aria-hidden="true"></i></span>
            <span class="thankyou-last-step d-flex align-items-center justify-content-center text-white"><i class="fas fa-check"></i></span>
        </div>

        <div class="thankyou text-center mr-auto ml-auto ">
            <div class="mb-3 text-center d-flex align-items-center justify-content-center mx-auto bg-success" style="border-radius: 50%;width: 100px; height: 100px;" >
                <i class="fas fa-check text-white" style="font-size: 50px"></i>
            </div>
            <h2>Well done! Your reservation has been send.</h2>
            <p>Wait for confirmation of your Reservation</p>
           <a href="/"><button class="button-grad border">Home page </button></a>
        </div>
    </div>
@endsection