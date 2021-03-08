@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card text-center px-5 pt-5">
                <h1>Sign in</h1>
                <div class="card-body px-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group d-flex justify-content-center" style="position: relative">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->
                            <div class="w-100">
                                <input id="email" type="email" class="form-control pl-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <i class="fa fa-user icon p-3 text-muted" style="position: absolute; left:5px; top: -5px;"></i>
                        </div>

                        <div class="form-group d-flex justify-content-center" style="position: relative">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->
                            <div class="w-100">
                                <input id="password" type="password" class="form-control pl-5 pr-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <i class="fa fa-lock icon p-3 text-muted" style="position: absolute; left:5px; top: -5px;"></i>
                                <i id="far-eye" class="far fa-eye icon py-3 pr-3 text-muted" style="cursor: pointer; position: absolute; right:5px; top: -5px;"></i>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <div>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link mb-0" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                        </div>
                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-default button-grad w-100 text-white bg-dark">
                                {{ __('Login') }}
                            </button>
                        </div>

                            <p class="more-oauth-login-title">
                                Or sign in using   
                            </p>

                        <ul class="d-flex align-items-center justify-content-around more-oauth-login-list text-uppercase list-unstyled">
                            <li class="d-flex justify-content-center border px-3 py-2 w-100 btn btn-light ">
                                <img src="{{ asset('images/icons/google.svg')}}" alt="" class="mx-1" width="15">
                                <a href="login/google" class="text-decoration-none text-muted">google</a>
                            </li>
                        </ul>

                        <div class="pt-5 text-muted">
                            <small>
                                By sign in this way, you agree to our
                                <a href="#" class="text-muted text-line"><u>Terms & Condition</u></a>
                                and
                                <a href="#" class="text-muted"><u>Privary Policy</u></a>
                            </small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection
