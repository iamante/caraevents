@extends('layouts.app')
@section('content')

<!-- -------------------------------- carousel -------------------------------- -->

<div style="position: relative">
    <a href="#" id="scroll" style="display: none;"><span><img src="/images/icons/arrow-up.svg" alt="arrow-up"></span></a>
    <div class="cara-bgimage">
        <div class="cara-text text-center">
            <h1 style="font-size: 40px" class="cara-head">Caraevents<br> Consultancy and Co.</h1>
            <p>We Offer Wedding, Birthday, Party, Catering, Debut and many more!</p>
            <a href="/services" style="text-decoration: none;"><div class="button-grad m-auto" style="width: 200px;">Inquire Now</div></a>
        </div>
    </div>
</div>
                <!-- <div id="carouselIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators align-items-center">
                        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselIndicators" data-slide-to="2"></li>
                    </ol> 
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 img-fluid" src="images/1.jpg" alt="First slide">
                            <div class="carousel-caption d-md-block ml-auto mr-auto">
                                <h6>The Heart of Services</h6>
                                <h1>Caraevents</h1>
                                <h1>Concultancy and Co.</h1>
                                <p>Our services is Good when it comes to events</p>
                                <div class="btn btn-primary">Get Started</div>
                            </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 img-fluid" src="images/2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <a href="/services/civil-a"><img class="d-block w-100 img-fluid" src="images/3.jpg" alt="Third slide"></a>
                    </div>
                    </div>
        
                    <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                </div> -->

<!-- ----------------------------- end of carousel ---------------------------- -->

<div class="container text-center my-5">
    <h2>We will give everything you need in one place.</h2>
    <p>Save the dates, invitations, video cover pages, event scheduling, RSVPs, notifications and more!</p>
</div>

<div class="container text-center my-5">
    <div class="row my-4">
        @foreach ($services as $service)
            <div class="col-md-4 px-0">
                <img class="img-fluid service-border" src="{{ asset('images/border/border.svg') }}" alt="border" style="pointer-events:none; width: 100% ; height: 72%;object-fit: cover;">
                <a href="{{ route('services.index') }}" style="text-decoration: none;">
                    <img src="{{ asset('storage/'. $service->image) }}" class="image-animate" alt="" style="width: 100% ; height: 70%;object-fit: cover; background-repeat: no-repeat;">
                    <h5 class="font-weight-bold mt-4" style="color: rgb(13, 209, 157)">{{ $service->name }}</h5>
                </a>
                <p class="px-3">{{ strip_tags($service->description) }}</p>
            </div>
        @endforeach
    </div>
        <a href="/services"><div class="btn btn-default button-grad text-center mt-5">More Services</div></a>
</div>
<!-- --------------------------------- other -------------------------------- -->

<div class="container text-center py-5 my-5">
    <h4 class="mb-0" style="color: rgb(13, 209, 157)">Other Services</h4>
    <h1>We also provide</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo labore ut, hic esse doloribus cum culpa atque sunt voluptates nostrum ipsam tempore ipsa dolorum fugiat non veniam eius quas earum.</p>
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
    <div class="testimonial-container container text-center pt-5 text-light">
        <p class="mb-0 text-light">TESTIMONIAL</p>
        <h3 class="text-light">What our clients say about us.</h3>
        <div class="row my-4 text-left slick-testimonial">
            <div class="col-4">
                <div class="card border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-quote-left py-2" aria-hidden="true" style="color: #ca96a6"></i>
                            <i class="fa fa-quote-right py-2" aria-hidden="true" style="color: #ca96a6"></i>
                        </div>
                        <p class="text-center">Its good experience I highly recommend them <br> very professional and friendly staff.</p>
                    </div>
                    <div class="card-footer">
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
            <div class="col-4">
                <div class="card border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-quote-left py-2" aria-hidden="true" style="color: #ca96a6"></i>
                            <i class="fa fa-quote-right py-2" aria-hidden="true" style="color: #ca96a6"></i>
                        </div>
                        <p class="text-center">Sobrang nirerecomend po natin ito dahil naging maayos at pinaka masayang araw ng buhay namin ang araw ng aming kasal. thank you po..</p>
                    </div>
                    <div class="card-footer">
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
            <div class="col-4">
                <div class="card border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <i class="fa fa-quote-left py-2" aria-hidden="true" style="color: #ca96a6"></i>
                            <i class="fa fa-quote-right py-2" aria-hidden="true" style="color: #ca96a6"></i>
                        </div>
                        <p class="text-center">They were very accommodating and helps you in everything you need in an any event💞💝</p>
                    </div>
                    <div class="card-footer">
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
        <div class="col-4">
            <img src="images/icons/quality.png" alt="" width="50" class="m-2">
            <h4>HIGH QUALITY SERVICES</h4>
            <p><small>Select services from top rated good quality services , No tech skills required to publish content instantly.</small></p>
        </div>
        <div class="col-4">
            <img src="images/icons/lowest-promo.png" alt="" width="50" class="m-2">
            <h4>LOWEST PROMO</h4>
            <p><small>Invite and delight your guests with one-to-one lowest promo for services, consultancy, and rentals.</small></p>
        </div>
        <div class="col-4">
            <img src="images/icons/reserve.png" alt="" width="85" class="m-2">
            <h4>MADE RESERVATION EASY</h4>
            <p><small>Check whats knew for your reservation. Easy reserve and update what's happen from any device.</small></p>
        </div>
    </div>
</div>
@endsection