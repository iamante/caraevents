@extends('layouts.app')
@section('content')

<!-- -------------------------------- carousel -------------------------------- -->
<div class="cara-bgimage">
    <div class="cara-text">
        <h1 style="font-size: 40px" class="cara-head">Caraevents<br> Consultancy and Co.</h1>
        <p>We Offer Wedding, Birthday, Party, Catering, Debut and many more!</p>
        <a href="/services"><button style="border: 1px solid black">Inquire Now</button></a>
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
    <h2 style="font-family: 'Times New Roman', Times, serif">Everything you need in one place.</h2>
    <p>Save the dates, invitations, video cover pages, event scheduling, RSVPs, notifications, photo sharing, travel planning and more!</p>
    <div class="row my-5 bg-light p-3">
        <div class="col-4">
            <img src="images/icons/quality.png" alt="" width="50" class="m-2">
            <h4 style="font-family: 'Times New Roman', Times, serif">HIGH QUALITY SERVICES</h4>
            <p><small>Select designs from top names in fashion and lifestyle, No tech skills required to publish content instantly.</small></p>
        </div>
        <div class="col-4">
            <img src="images/icons/lowest-promo.png" alt="" width="50" class="m-2">
            <h4 style="font-family: 'Times New Roman', Times, serif">LOWEST PROMO</h4>
            <p><small>Invite and delight your guests with one-to-one settings for posting, viewing, sharing.</small></p>
        </div>
        <div class="col-4">
            <img src="images/icons/reserve.png" alt="" width="85" class="m-2">
            <h4 style="font-family: 'Times New Roman', Times, serif">MADE RESERVATION EASY</h4>
            <p><small>Stay on top of it all wherever you go. Collect replies and update details from any device.</small></p>
        </div>
    </div>
</div>


<!-- --------------------------------- product -------------------------------- -->
    <section id="product">
        <div class="container">
            <div class="product-title">
                <h6 class="mb-3">Featured Events</h6>
            </div>
            <div class="row">
                @foreach ($services as $service)
                <div class="col-md-12 col-lg-6">
                    <div class="card figure">
                        <img class="card-img-top featured-image" src={{ asset('storage/'. $service->image) }} alt="Card image cap" style="height: 100%">
                    </div>
                    <p class="text-dark text-center mb-0 mt-1" style="text-transform: uppercase; font-weight: 900; letter-spacing: 3px;">{{ $service->name }}</p>
                    <p class="text-center">₱ {{ $service->price }}</p>
                </div>
                @endforeach
                <div class="col-md-12 col-lg-6">
                    <div class="row">   
                        @foreach ($servicesSecondRow as $service) 
                            <div class="col-md-6">
                                <div class="card figure">
                                    <a href="{{ route('services.show', $service->slug ) }}"><img class="card-img-top featured-image" src={{ asset('storage/'. $service->image) }} alt="Card image cap"></a>
                                </div>
                                <p class="text-dark text-center mb-0 mt-1" style="text-transform: uppercase; font-weight: 900; letter-spacing: 3px;">{{ $service->name }}</p>
                                <p class="text-center mb-1">₱ {{ $service->price }}</p>
                            </div>
                        @endforeach
                    </div>
                        <div class="row">  
                            @foreach ($servicesThirdRow as $service)
                                <div class="col-md-6">
                                    <div class="card figure">
                                        <img class="card-img-top featured-image" src={{ asset('storage/'.$service->image) }} alt="Card image cap">
                                    </div>
                                    <p class="text-dark text-center mb-0 mt-1" style="text-transform: uppercase; font-weight: 900; letter-spacing: 3px;">{{ $service->name }}</p>
                                    <p class="text-center">₱ {{ $service->price }}</p>
                                </div>
                            @endforeach  
                        </div>
                </div>
            </div>
        </div>
    </section>

<!-- ----------------------------- end of product ----------------------------- -->

<!-- ----------------------------------  --------------------------------- -->
<section id="cara">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="cara-title">
                    Caraevents <br>
                    <span>Consultancy and Co.</span>
                </h6>
                <p>We Offer Wedding, Debut, Kiddie Party, Birthdays, Baptismal, Corporate Events, School party, Reunion, Bridal Shower, Anniversary, Stag party, etc.</p>
                <p>Our goal is to provide quality and excellent customer service to the satisfaction of the clients.</p>
            
                <a href="/about"><div class="btn btn-dark text-white" >Learn More</div></a>
            </div>
            <div class="col-lg-6">
                <img src="images/4.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>

<!-- --------------------------------- -------------------------------- -->

<section class="testimonial">
    <div class="testimonial-container container text-center pt-5 text-light">
        <p class="mb-0 text-light">TESTIMONIAL</p>
        <h3 style="font-family: 'Times New Roman', Times, serif" class="text-light">What our clients say about us.</h3>
        <div class="row my-4 text-left">
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

<!-- ---------------------------------- blog --------------------------------- -->

    <section id="blog">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12">
                    <h6 class="blog-title mb-0">
                        Latest Blog
                    </h6>
                    <p>For best consultancy that you ever have.</p>
                    <div class="d-flex">
                        <div class="card mb-3 w-100">
                            <img class="d-block w-100 img-fluid" src="images/rent/vblog3.png" alt="Second slide">
                            <div class="card-body">
                                <h5 class="d-block g-color-gray-dark-v4 g-font-weight-600 g-font-size-12 text-uppercase mb-2">
                                    10/08/2020 </h5>
                                    <h5 class="h5 g-color-black g-font-weight-600 mb-3">
                                        <a class="u-link-v5 g-color-black g-color-primary--hover g-cursor-pointer" href="https://www.youtube.com/watch?v=2omvPtbNr2I&amp;feature=share" target="_blank" rel="nofollow">ALL ABOUT MARRIAGE CONTRACT (CARA EVENTS PH) #26 <i class="fa fa-external-link g-color-primary"></i></a>
                                        </h5>
                                        <p class="g-color-gray-dark-v4 g-line-height-1_8">
                                            MARAMING SALAMAT PO MONETIZED NA TAYO.<br>
                                            MARAMING SALAMAT PO SA SUPPORTA NINYONG LAHAT.<br>
                                            PLS. LIKE, SHARE, HIT THE BELL BUTTON AND SUBCRIBE.<br>
                                            THANKS PO, CARA EVENTS PHILIPPINES. </p>
                                            </div>
                          </div>
                          <div class="card mb-3 w-100">
                            <img class="d-block w-100 img-fluid" src="images/rent/vblog1.png" alt="Second slide">
                            <div class="card-body">
                                <h5 class="d-block g-color-gray-dark-v4 g-font-weight-600 g-font-size-12 text-uppercase mb-2">
                                    10/08/2020 </h5>
                                    <h5 class="h5 g-color-black g-font-weight-600 mb-3">
                                        <a class="u-link-v5 g-color-black g-color-primary--hover g-cursor-pointer" href="https://www.youtube.com/watch?v=2omvPtbNr2I&amp;feature=share" target="_blank" rel="nofollow">HOW TO GET 100 % APPROVAL FROM GOOGLE ADSENSE ? (CARA EVENTS PH) # 34 <i class="fa fa-external-link g-color-primary"></i></a>
                                        </h5>
                                        <p class="g-color-gray-dark-v4 g-line-height-1_8">
                                            HOW TO GET 100 % APPROVAL FROM<br>
                                            GOOGLE ADSENSE ? Wedding tips from a 22<br>
                                            years of experience. PLS. LIKE, SHARE, HIT<br>
                                            THE BELL BUTTOM AND SUBSCRIBE. <br>
                                            # HANAPBUHAY.
                                        </p>
                                            </div>
                          </div>
                          <div class="card mb-3 w-100">
                            <img class="d-block w-100 img-fluid" src="images/rent/vblog2.png" alt="Second slide">
                            <div class="card-body">
                                <h5 class="d-block g-color-gray-dark-v4 g-font-weight-600 g-font-size-12 text-uppercase mb-2">
                                    10/08/2020 </h5>
                                    <h5 class="h5 g-color-black g-font-weight-600 mb-3">
                                        <a class="u-link-v5 g-color-black g-color-primary--hover g-cursor-pointer" href="https://www.youtube.com/watch?v=2omvPtbNr2I&amp;feature=share" target="_blank" rel="nofollow">REQUIREMENTS FOR ANNULLED & WIDOW/WIDOWER (CARA EVENTS PH) # 27 <i class="fa fa-external-link g-color-primary"></i></a>
                                        </h5>
                                        <p class="g-color-gray-dark-v4 g-line-height-1_8">
                                            MARAMING SALAMAT PO MONETIZED NA TAYO.<br>
                                            MARAMING SALAMAT PO SA SUPPORTA NINYONG LAHAT.<br>
                                            PLS. LIKE, SHARE, HIT THE BELL BUTTON AND SUBCRIBE.<br>
                                            THANKS PO, CARA EVENTS PHILIPPINES. </p>
                                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ----------------------------- end of about ----------------------------- -->


<!-- ----------------------------- map ----------------------------- -->

    <iframe class="img-fluid" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.175785698266!2d121.05430725019416!3d14.702649089687183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ba0ce965a977%3A0xcace75fb83bd1c1e!2sCara%20Events%20Philippines!5e0!3m2!1sen!2sph!4v1600260000245!5m2!1sen!2sph" width="1920" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>


<!-- ----------------------------- end of map ----------------------------- -->

<!-- ----------------------------- newsletter ----------------------------- -->

<!-- ----------------------------- end of newsletter ----------------------------- -->

@endsection