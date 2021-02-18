@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="thankyou text-center mr-auto ml-auto ">
            <div class="mb-3 text-center d-flex align-items-center justify-content-center mx-auto" style="border-radius: 50%;width: 100px; height: 100px; background-image: linear-gradient(315deg, #20bf55 0%, #01baef 74%);" >
                <i class="fas fa-check text-white" style="font-size: 50px"></i>
            </div>
            <h2>Well done! Reservation has been send.</h2>
            <p>Wait for confirmation of your Reservation</p>
           <a href="/"><button class="button-grad border">Home page </button></a>
        </div>
    </div>
@endsection