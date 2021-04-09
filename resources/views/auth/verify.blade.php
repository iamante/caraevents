@extends('layouts.app')

@section('content')
<div class="bg-light">
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm py-4">
                    <div class="card-header text-center bg-white border-0 pt-4">
                        <img src="{{ asset('storage/users/logo1.png') }}" alt="" class="img-fluid mr-2" width="50" > <br>
                        {{ __('Caraevents Consultancy & Co.') }} <br>
                        <small class="text-muted">{{ __('Verify Your Email Address') }}</small>
                    </div>

                    <div class="card-body text-center">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
