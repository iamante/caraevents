@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 px-3">
                    <div >
                        <div class="d-flex align-items-center mb-3 bg-white shadow-sm p-3">
                            @if (auth()->user()->avatar == 'users/default.png')
                            <img src="{{ asset('storage/'. auth()->user()->avatar) }}" alt="" class="img-fluid mr-3" width="50"style="border: 1px solid #cccccc; border-radius: 50%;">
                            @else
                            <img src="{{ asset('storage/users/'.auth()->user()->avatar) }}" alt="" class="img-fluid mr-3" width="50"style="border: 1px solid #cccccc; border-radius: 50%;">
                            @endif
                            <div>
                                <a href="/user-profile" class="text-dark font-weight-bold">
                                    {{ Auth::user()->name }}
                                </a>
                            <p class="mb-0 text-muted"><i class="fa fa-marker"></i> Edit Profile</p>
                            </div>
                        </div>
                        
                        <ul class="list-unstyled bg-white shadow-sm p-3" style="font-size: 14px;">
                           <li class="pb-1"><i class="far fa-user mr-3 ml-1"></i><a href="/user-profile" class="font-weight-bold text-dark"> Profile</li></a>
                            {{-- <li class="pb-1"><i class="far fa-bell mr-3 ml-1"></i><a href="#">Notification</a></li> --}}
                            <li class="pb-1"><i class="fa fa-ticket-alt mr-3 ml-1"></i><a href="/my-reservation">Reservation</a></li>
                            <li class="pb-1"><img src="{{ asset('images/icons/logout.svg')}}" alt="logout" width="18" class="mr-3">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                
                                <form action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>    
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 bg-white p-0 shadow-sm">
                    <form enctype="multipart/form-data" action="{{ route('users.update')}}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="text-white bg-dark py-3 px-5 mb-4">
                            <h4 class="font-weight-bold">My Profile</h4 >
                            <p class="mb-0">Manage and Edit your profile</p>
                        </div>
                        <div class="w-50 d-flex align-items-center ml-5">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                
                        @if (count($errors) > 0)
                            <div class="alert alert-danger ml-5">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>
                        <div class="row px-5 pb-4">
                            <div class="col-md-6">
                                <div class="form-group w-100">
                                    <label for="name">Name</label>
                                    <input name="name" type="text" class="form-control" value="{{ old('name', $user->name)}}">
                                </div>
                                <div class="form-group w-100">
                                    <label for="name">Email</label>
                                    <input name="email" type="email" class="form-control" value="{{ old('email', $user->email)}}">
                                </div>
                                <div class="form-group w-100">
                                    <label for="name">Password</label>
                                    <input name="password" type="password" class="form-control">
                                    <p>Leave password blank to keep current password</p>
                                </div>
                                <div class="form-group w-100">
                                    <label for="name">Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success px-5 border">Save</button>
                            </div>
                            <div class="col-md-6 text-center w-100 mx-auto d-block pt-5">
                                @if (auth()->user()->avatar == 'users/default.png')
                                    <img src="{{ asset('storage/'.auth()->user()->avatar ) }}" alt="avatar" class="img-fluid rounded-circle imagePreview" style="width: 100px; height: 100px;">
                                @else
                                    <img src="{{ asset('storage/users/'.auth()->user()->avatar ) }}" alt="avatar" class="img-fluid rounded-circle imagePreview" style="width: 100px; height: 100px;">
                                @endif
                                <p class="font-weight-bold mb-1 mt-2">Update Profile Image</p>
                                <label for="files" class="btn inpFile">Select Image</label>
                                <input type="file" name="avatar" id="inpFile" style="display: none">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection