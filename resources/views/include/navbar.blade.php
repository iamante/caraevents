<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm bg-light py-3 px-0">
    <div class="container-fluid px-5">
        <div>
            <a class="navbar-brantext-white d-flex align-items-center" href="/" style="color: #af915f">
                <img src="{{ asset('storage/users/logo1.png') }}" alt="" class="img-fluid mr-2" width="35" > 
                <div class="brands">
                    <span>caraevents</span>
                </div>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item mr-3 d-flex align-items-center">
                    <a class="nav-link px-2" href="/" style="color:#505050">HOME</a>
                </li>
                <li class="nav-item dropdown mr-3 ">
                    <a style="color:#505050" class="nav-link px-2 dropdown-toggle" href="/services" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    SERVICES <span class="arrow-down"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-sm-center py-1 dropdown-services" aria-labelledby="navbarDropdown" style="border-radius: 0">
                    <a class="dropdown-item py-2" href="/services">All Services</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/services?category=wedding">Wedding</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/services?category=birthday">Birthday</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/services?category=catering">Catering</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="#">Party</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="#">Accessories</a>
                </div>
                <li class="nav-item mr-3 dropdown">
                    <a style="color:#505050" class="nav-link px-2 dropdown-toggle" href="/services" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    RENTALS <span class="arrow-down"></span>
                </a>
                <div class="dropdown-menu py-1 dropdown-services" aria-labelledby="navbarDropdown" style="border-radius: 0">
                    <a class="dropdown-item py-2" href="/rental">CAR</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/clothing">GOWN</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/clothing">BARONG</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/clothing">COAT</a>
                </div>
                </li>
                <li class="nav-item d-flex align-items-center mr-3">
                    <a class="nav-link px-2" href="/gallery" style="color:#505050">GALLERY</a>
                </li>
                <li class="nav-item mr-3 dropdown">
                    <a style="color:#505050" class="nav-link px-2 dropdown-toggle" href="/about" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ABOUT <span class="arrow-down"></span>
                </a>
                <div class="dropdown-menu py-1 dropdown-services" aria-labelledby="navbarDropdown" style="border-radius: 0">
                    <a class="dropdown-item py-2" href="/about">ABOUT US</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/about">BLOG</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/about">SOCIAL MEDIA</a>
                </div>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link px-2" href="/contact" style="color:#505050">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>