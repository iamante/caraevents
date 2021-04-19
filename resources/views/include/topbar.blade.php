<div class="container-fluid top-login py-0">
    <div class="container-fluid top-padding d-flex justify-content-between align-items-center">
            <div class="top-icon">
            <a href="tel:+639228097519" style="font-size: 11px">Call Us. <i class="fa fa-phone m-0 pr-1"></i><span class="tel" >+63 922 809 7519</span></a>
            </div>
            
        <div class="nav-item">
            @guest
                <div class="my-2">
                    @if (Route::has('register')) 
                    <a href="{{ route('register') }}" class="py-2 px-2 register">{{ __('Sign Up') }}</a>
                    @endif
                    <span class="px-1 text-muted">|</span>
                    <a href="{{ route('login') }}" class="px-2 register"><img src="{{ asset('images/icons/Sign in.svg')}}" alt="login" width="20" class="mr-1"> {{ __('Login') }}
                    </a>
                    
                </div>
            @else
            <div>
                <!-- Right Side Of Navbar {{ Auth::user()->name }} -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <div class="d-flex align-items-center">
                            {{-- <a href="#"><i class="far fa-bell"></i> Notifications</a>   --}}
                            <li class="dropdown ml-2 py-2" > 
                                <a href="#" class="dropdown-toggle text-muted username" data-toggle="dropdown" role="button" aria-expanded="false">
                                     @if (Auth::user()->avatar == 'users/default.png')
                                     <i class="fas fa-user p-2 text-white" style="background-color: #a9a9a9; border-radius: 50%"></i> 
                                     @else
                                     <img src="{{ asset('storage/'. auth()->user()->avatar) }}" alt="" class="img-fluid ml-2" width="25" style="border-radius: 50%;"> 
                                     @endif
                                     My account
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <i class="far fa-user pr-2 text-muted"></i>
                                            <div>
                                                <a href="/user-profile">
                                                    My Profile
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="/my-reservation" class="d-flex align-items-center">
                                            <i class="fas fa-tty pr-2 text-muted"></i>My Reservation
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="mr-4" >
                                            <i class="fas fa-power-off text-muted"></i>&nbsp; Logout
                                        </a>
    
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    @endif
                </ul>
            </div>
            @endguest
        </div>
    </div>
</div>