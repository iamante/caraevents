@extends('layouts.app')

@section('content')
<div class="bg-light">
    <div class="container py-5">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card px-5 pt-5 shadow-sm border-0">
                <div class="px-5 mb-2 text-center">
                    <h2>Create Account</h2>
                    <small>To get started fill in this form to start your reservations.</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group d-flex justify-content-center align-items-center" style="position: relative">
                            <i class="far fa-user icon p-3 text-muted" style="position: absolute; left:5px;"></i>
                                <input id="name" type="name" class="form-control pl-5 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <!-- <div class="form-group d-flex justify-content-center align-items-center ml-2" style="position: relative">
                            <i class="far fa-user icon p-3 text-muted" style="position: absolute; left:5px;"></i>
                                <input id="lname" type="lname" class="form-control pl-5 @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" placeholder="Last name" required autocomplete="name" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> -->

                        <!-- <div class="form-group d-flex justify-content-center align-items-center" style="position: relative">
                            <i class="fas fa-phone icon p-3 text-muted" style="position: absolute; left:5px;"></i>
                                <input id="phone" type="name" class="form-control pl-5 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone number" required autocomplete="number" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> -->

                        <div class="form-group d-flex justify-content-center align-items-center" style="position: relative">
                            <div class="w-100">
                                <i class="far fa-envelope icon p-3 text-muted" style="position: absolute; left:5px;"></i>
                                <input id="email" type="email" class="form-control pl-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center align-items-center" style="position: relative">
                            <div class="w-100">
                                <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->
                                <input id="password" type="password" class="form-control pl-5 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <i class="fa fa-lock icon p-3 text-muted" style="position: absolute; left:5px; top: -5px;"></i>
                            <i id="far-eye" class="far fa-eye icon py-3 pr-3 text-muted" style="cursor: pointer; position: absolute; right:5px; top: -5px;"></i>
                        </div>

                        <div class="form-group d-flex justify-content-center align-items-center" style="position: relative">
                            <i class="fas fa-lock icon p-3 text-muted" style="position: absolute; left:5px;"></i>
                                <input id="password" type="password" class="form-control pl-5" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>

                        <input type="hidden" class="g-recaptcha" name="g-recaptcha">
                        <div class="d-flex align-items-center mb-4">
                            <input type="checkbox" checked="checked" name="remember" class="mr-2"> 
                            <small>By creating an account you agree to our <a href="/termsconditions">Terms</a> & <a href="/privacypolicy">Privacy.</a></small>
                        </div>

                        <div class="form-group text-right my-3">
                                <button type="submit" class="btn btn-success text-white w-100">
                                    {{ __('Register') }}
                                </button>
                        </div>
                        
                        <div class="bg-light text-center py-3 my-2" style="font-size: 11px;">
                            Already have a account? <a href="/login" class="my-2">Sign in</a>
                        </div>

                        <div class="mt-5" style="font-size: 10px;">
                            This site is protected by reCAPTCHA and the Google
                            <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                            <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
</div>
@endsection
