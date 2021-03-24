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
            <div class="mb-3 text-center d-flex align-items-center justify-content-center mx-auto bg-success" style="border-radius: 50%;width: 100px; height: 100px; margin-top: 130px;" >
                <i class="fas fa-check text-white" style="font-size: 50px"></i>
            </div>
            <h2 style="margin-top: 2.6rem">Well done! Your reservation has been send.</h2>
            <p style="margin-bottom: 4rem">Details of reservation has been send in your email.</p>
           <a href="/" class=" text-dark my-2" style="font-size: 15px">Home page <i class="fas fa-arrow-left pl-2"></i></button>
        </div>
    </div>
@endsection