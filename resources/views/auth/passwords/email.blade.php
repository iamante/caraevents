@extends('layouts.app')

@section('content')
<div class="bg-light">
    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-white border-0 pt-4">
                    <img src="{{ asset('storage/users/logo1.png') }}" alt="" class="img-fluid mr-2" width="50" > <br>
                    <h5>{{ __('Forgot Password') }}</h5> <br>
                    <p class="text-dark">Enter your email and we'll send you a link <br> to reset your password.</p>
                </div>

                <div class="card-body px-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="text-center">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success text-white w-100">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-white border-0">
                    <div class="text-center">
                        <a href="/login" class="text-muted"><i class="fa fa-angle-left pr-2"></i> Back to login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
