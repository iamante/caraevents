@extends('layouts.app')
@section('content')

    <div class="parallax-img bg-dark" style="">
        <img src="{{ asset('images/about.jpg')}}" alt="" class="img-fluid">
        <div class="parallax-text">
            <h1 class="mb-3" style="font-weight: 400;">About Us</h1>
            <div class="position-relative">
                <i class="fas fa-users"></i>
                <div class="hr-line"></div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <img src="images/aboutimg.png" alt="" class="pl-5 img-fluid">
            </div>
            <div class="col-lg-5">
                
                <p class="text-justify" style="text-indent: 50px">The business opens last December 30, 1998. It started with Gowns and Barongs for rent. The shop is located at 1886 Metom St. Manggahan GAO, Brgy. Commonwealth, Quezon City. Then we offer coordination on different Hotels and Restaurants for the reception. More and more Services added, then the rest was history. We are proud that the company is now, a ONE STOP SHOP, carrying License services to honeymoon packages.</p>
                <p class=" mb-5">The office was transferred to  Blk. 85, Lot 29A, Riyal St., United North, Fairview, Quezon City, May of 2014.</p>

                <h4 style="color: rgb(17, 151, 17)">Our Mission</h4>
                <p class="mb-5">To provide quality and excellent customer service to the satisfaction of the clients</p>
                <h4 style="color: rgb(17, 151, 17)">Our Vision</h4>
                <p>1. To be competitive in the area of events coordination and consultancy.<br>2. To be the top leading company in the field of events coordination that would fit one’s budget.</p>
                
            </div>
        </div>
    </div>
@endsection