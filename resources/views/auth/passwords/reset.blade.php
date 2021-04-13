@extends('layouts.app')

@section('content')
<div class="bg-light">
    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm py-4">
                <div class="card-header text-center bg-white border-0 pt-4">
                    <img src="{{ asset('storage/users/logo1.png') }}" alt="" class="img-fluid mr-2 mb-2" width="50" > <br>
                        
                        <p class=" mb-0">{{ __('Dont worry we got you.') }}</p>
                        <h4 class="mb-0">{{ __('Reset Your Password') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row mx-4">
                            <label for="email" class=" text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="w-100">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <label for="password" class="col-form-label text-md-right mx-4">{{ __('New Password') }}</label>
                        <div class="form-group mx-4 position-relative d-flex justify-content-center align-items-center">
                            {{-- <label for="password" class="col-form-label text-md-right">{{ __('New Password') }}</label> --}}

                            <div class="w-100">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <i id="far-eye" class="far fa-eye icon py-3 pr-3 text-muted" style="cursor: pointer; position: absolute; right:5px; top: -5px;"></i>
                        </div>

                        <div class="form-group row mx-4">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="w-100">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 mx-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success text-white">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
