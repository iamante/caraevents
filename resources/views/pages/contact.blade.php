@extends('layouts.app')
@section('content')
@include('include.navigation')
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card p-4">
                    <form action="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center"><h3>Message Us</h3><hr style="width: 75%; height:1px;"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="">Name</label><br>
                                        <input type="text" class="form-control w-100" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="">Email</label><br>
                                        <input type="email" class="form-control w-100" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="">Subject</label><br>
                                        <input type="text" class="form-control w-100" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <label for="">Phone Number</label><br>
                                        <input type="text" class="form-control w-100" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label for="">Message</label> <br>
                                        <textarea name="textbox" id="" cols="50" rows="10" class="form-control w-100" required></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-default my-2 button-grad">Send Mail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title">Office Address 1 ( Showroom )</div>
                        <div class="card-text">
                            <p>Block 85 Lot 29A, Riyal Street, United North Park, Phase 8, Fairview Subdivision Quezon City</p>
                            <p>Email Address : <a href="mailto:support@caravents.com">support@caravents.com</a></p>
                            <p>Phone Number : <a href="tel:+639228097519">+63 922 809 7519</a></p>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title">Office Address 2 ( Query )</div>
                        <div class="card-text">
                            <p>Tower C, Mplace condo, South Triangle, Quezon City</p>
                        </div>
                        <div class="card-text">
                            <p>Meet up only : <br> Office Hours :   Monday to Thursday - 7pm to 12mn</p>
                        </div>
                        <div class="card-text">
                            <p>By appointment : <br> Friday to Sunday – 9am to 12MN</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <iframe class="img-fluid mt-3" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15436.703142064003!2d121.0565013!3d14.7026491!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcace75fb83bd1c1e!2sCara%20Events%20Philippines!5e0!3m2!1sen!2sph!4v1600268794813!5m2!1sen!2sph" width="1920" height="1920" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

        </div>
    </div>
@endsection