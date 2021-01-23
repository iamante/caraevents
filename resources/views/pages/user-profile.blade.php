@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 px-3">
                    <div >
                        <div class="d-flex align-items-center mt-5 mb-3 bg-white shadow-sm p-3">
                            <img src="{{ asset('storage/users/woman.svg') }}" alt="" class="img-fluid mr-3" width="50"style="border: 1px solid #cccccc; border-radius: 50%;">
                            <div>
                                <a href="/user-profile" class="text-dark font-weight-bold">
                                    {{ Auth::user()->name }}
                                </a>
                            <p class="mb-0 text-muted"><i class="fa fa-marker"></i> Edit Profile</p>
                            </div>
                        </div>
                        
                        <ul class="list-unstyled bg-white shadow-sm p-3" style="font-size: 14px;">
                            <li class="pb-1"><i class="far fa-user mr-3 ml-1"></i> Profile</li>
                            <li class="pb-1"><i class="far fa-bell mr-3 ml-1"></i> Notification</li>
                            <li class="pb-1"><i class="fa fa-ticket-alt mr-3 ml-1"></i>Reservation</li>
                            <li class="pb-1"><i class="fas fa-key mr-3 ml-1"></i>Change Password</li>
                            <li class="pb-1"><img src="{{ asset('images/icons/logout.svg')}}" alt="logout" width="18" class="mr-3"> Logout</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 bg-white p-5 shadow-sm">
                    <!-- <div class="d-flex justify-content-center">
                       <img src="{{ asset('images/services/yatchfarewell-a.jpg')}}" alt="" class=" rounded-circle" width="160" height="160">
                    </div> 
                    <h4 class="text-center mt-3 mb-4">James Amante</h4>
                    -->
                    <form action="{{ route('users.update')}}" method="POST">
                        @method('patch')
                        @csrf
                        <h4 class="font-weight-bold" style="font-family: 'Times New Roman', Times, serif">My Profile</h4 >
                        <p>Manage and Edit your profile</p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 pr-3">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" value="{{ old('name', $user->name)}}">
                            </div>
                            <div class="form-group w-100 pl-3">
                                <label for="name">Last Name</label>
                                <input name="lname" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 pr-3">
                                <label for="name">Phone Number</label>
                                <input name="phone" type="text" class="form-control">
                            </div>
                            <div class="form-group w-100 pl-3">
                                <label for="name">Email</label>
                                <input name="email" type="text" class="form-control" value="{{ old('name', $user->email)}}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group w-100 pr-3">
                                <label for="name">Password</label>
                                <input name="password" type="text" class="form-control">
                            </div>
                            <div class="form-group w-100 pl-3">
                                <label for="name">Confirm Password</label>
                                <input name="confirm_password" type="text" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection