@extends('layouts.app')
@section('content')

<!-- -------------------------------- hero page -------------------------------- -->

    <div style="position: relative">
        <div class="cara-bgimage">
            <div class="cara-text text-center">
                <h1 style="font-size: 40px" class="cara-head">Caraevents<br> Consultancy and Co.</h1>
                <p>We Offer Wedding, Birthday, Party, Catering, Debut and many more!</p>
                <a href="/services" style="text-decoration: none;"><div class="button-grad m-auto" style="width: 200px;">Inquire Now</div></a>
            </div>
        </div>
    </div>

<!-- ----------------------------- end of hero page ---------------------------- -->

<!-- --------------------------------- services -------------------------------- -->
{{-- @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif --}}

<div class="container text-center my-5">
    <h2>We will give everything you need in one place.</h2>
    <p>Save the dates, invitations, video cover pages, event scheduling, RSVPs, notifications and more!</p>
</div>

<div class="container text-center my-5">
    <h4 class="mb-0" style="color: #38c172">Choose Your Events</h4>
    <h1 class="mb-5">Our Events Package</h1>
    <div class="row">
        @foreach ($services as $service)
            <div class="col-md-3 d-flex align-items-stretch">
                <div class="card border-0 shadow w-100">
                    <div class="d-flex align-items-center justify-content-center" style="background-color: #000000; opacity: 0.9; position: relative;height: 200px; display:block;">
                        <div>
                            <h3 class="text-white" style="font-weight: 900;">{{ $service->name }}</h3>
                            <h1 style="color: #20dd71; font-weight: 900; z-index: 2;">{{ $service->presentPrice() }}</h1>
                            <img src="{{ asset('storage/'. $service->image) }}" alt="" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 0; opacity: 0.2">
                        </div>
                    </div>
                    <div class="card-body text-center bg-light pb-5">
                        <ul class="list-unstyled py-3" style="font-size: 18px">
                            <li class="mb-3"><small>Up to <br>{{ $service->guests }}</small></li>
                            <li class="mb-3"><small>Free EMCEE <br>& Coordinators</small></li>
                            <li class="mb-3"><small>Main dish</small></li>
                            <li class="mb-3"><small>Sound System</small></li>
                        </ul>
                        <a href={{ route('services.show', $service->slug ) }}><button class="btn btn-success">Inquire Now</button></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-5" style="font-size: 20px"><a href="/services" class=" text-dark">More Services <i class="fas fa-arrow-right pl-2"></i></a></div>
</div>
<!-- --------------------------------- end of services -------------------------------- -->

<div class="container text-center py-5 my-5">
    <h4 class="mb-0" style="color: #38c172">Other Services</h4>
    <h1>We also provide</h1>
    <div class="row text-left">
        <div class="col-md-4 d-flex px-4">
            <img src="images/icons/contract.svg" alt="" width="72" class="mr-4">
            <div>
                <h4 class="mt-5">Documents / Consultancy</h4>
                <p>We will take care of your paperwork for your wedding and other stuff.</p>
            </div>    
        </div>
        <div class="col-md-4 d-flex px-4">
            <img src="images/icons/bridal_car.svg" alt="" width="72" class="mr-4">
            <div>
                <h4 class="mt-5">Bridal Car / Van Rentals</h4>
                <p>Rent our hyundai accent wedding car and services van.</p>
            </div>
        </div>
        <div class="col-md-4 d-flex px-4">
            <img src="images/icons/gallery.svg" alt="" width="72" class="mr-4">
            <div>
                <h4 class="mt-5">Video and Photo Coverage</h4>
                <p>We give you the best photo and video cover for your celebration.</p>
            </div>
        </div>
        <div class="col-md-4 d-flex px-4">
            <img src="images/icons/building.svg" alt="" width="72" class="mr-4">
            <div>
                <h4 class="mt-5">Venues</h4>
                <p>Check out our best hotel and venue for you comfortable experience.</p>
            </div>
        </div>
        <div class="col-md-4 px-4 d-flex">
            <img src="images/icons/makeup.svg" alt="" width="72" class="mr-4">
            <div>
                <h4 class="mt-5">Hair and Make up Artist</h4>
                <p>The best hair and makeup artist to make you shine.</p>
            </div>
        </div>
        <div class="col-md-4 px-4 d-flex">
            <img src="images/icons/wedding-couple.svg" alt="" width="72" class="mr-4">
            <div>
                <h4 class="mt-5">Money Tree / Money Dance</h4>
                <p>Unique and fun activities for your wedding receptions.</p>
            </div>
        </div>
    </div>
</div>
<!-- --------------------------------- -------------------------------- -->
<section class="testimonial"  style="overflow: hidden">
    <div class="testimonial-container container text-center pt-5 text-dark">
        <p class="mb-0 text-white">TESTIMONIAL</p>
        <h3 class="text-white">What our clients say about us.</h3>
        <div class="row my-4 text-left slick-testimonial">
            <div class="col-4 d-flex align-items-stretch justify-content-center">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-quote-left py-2" aria-hidden="true" style="color: #38c172;"></i>
                            <i class="fa fa-quote-right py-2" aria-hidden="true" style="color: #38c172;"></i>
                        </div>
                        <p class="text-center">Its good experience I highly recommend them <br> very professional and friendly staff.</p>
                    </div>
                    <div class="card-footer border-0 bg-white pb-4 ">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('images/testimonial/eddie.jpg') }}" alt="" width="50" class="rounded-circle">
                            <div class="text-left mx-2">
                                <p class="testimonial-name mb-0" style=" line-height: 8px;">Eddielen Permejo Ocampo</p>
                                <small>May 1, 2020</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 d-flex align-items-stretch justify-content-center">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-quote-left py-2" aria-hidden="true" style="color: #38c172;"></i>
                            <i class="fa fa-quote-right py-2" aria-hidden="true" style="color: #38c172;"></i>
                        </div>
                        <p class="text-center">Sobrang nirerecomend po natin ito dahil naging maayos at pinaka masayang araw ng buhay namin ang araw ng aming kasal. thank you po..</p>
                    </div>
                    <div class="card-footer border-0 bg-white pb-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('images/testimonial/shiela.jpg') }}" alt="" width="50" class="rounded-circle">
                            <div class="text-left mx-2">
                                <p class="testimonial-name mb-0" style=" line-height: 8px;">Sheila Valdez Ambong</p>
                                <small>April 25, 2020</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 d-flex align-items-stretch justify-content-center">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-quote-left py-2" aria-hidden="true" style="color: #38c172;"></i>
                            <i class="fa fa-quote-right py-2" aria-hidden="true" style="color: #38c172;"></i>
                        </div>
                        <p class="text-center">They were very accommodating and helps you in everything you need in an any event💞💝</p>
                    </div>
                    <div class="card-footer border-0 bg-white pb-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('images/testimonial/raquel.jpg') }}" alt="" width="50" class="rounded-circle">
                            <div class="mx-2">
                                <p class="testimonial-name mb-0" style=" line-height: 8px;">Raquel Malabayabas</p>
                                <small>April 24, 2020</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container text-center my-5">
    <div class="row my-5 bg-light p-3">
        <div class="col-md-4">
            <img src="images/icons/quality.png" alt="" width="50" class="m-2">
            <h4>HIGH QUALITY SERVICES</h4>
            <p><small>Select services from top rated good quality services , No tech skills required.</small></p>
        </div>
        <div class="col-md-4">
            <img src="images/icons/lowest-promo.png" alt="" width="50" class="m-2">
            <h4>LOWEST PROMO</h4>
            <p><small>Invite and delight your guests with one-to-one lowest promo for services, consultancy, and rentals.</small></p>
        </div>
        <div class="col-md-4">
            <img src="images/icons/reserve.png" alt="" width="85" class="m-2">
            <h4>MADE RESERVATION EASY</h4>
            <p><small>Check whats knew for your reservation. Easy reserve and update what's happening from any device.</small></p>
        </div>
    </div>
</div>
@endsection