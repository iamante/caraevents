<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm bg-light p-0">
    <div class="container-fluid px-5" style="position: relative">
        <div>
            <div class="navbar-brand d-flex align-items-center py-2">
                <img src="{{ asset('storage/users/logo1.png') }}" alt="" class="img-fluid mr-2 pb-2" width="60" > 
                <div class="brands">
                    Caraevents
                    <p>Consultancy & Co.</p>
                </div>
            </div>
        </div>
        <button class="navbar-toggler collapsed border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <div class="close-icon py-1 pr-1 fa-lg">✖</div>
          </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/" style="color:#505050">HOME</a>
                </li>
                <li class="nav-item dropdown mr-3">
                    <a style="color:#505050" class="nav-link dropdown-toggle" href="/services" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    SERVICES<span class="arrow-down"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-left dropdown-menu-sm-center py-1 dropdown-services" aria-labelledby="navbarDropdown" style="border-radius: 0">
                    <a class="dropdown-item py-2" href="/services">All Services</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/services?category=wedding">Wedding</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/services?category=birthday">Birthday</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/services?category=catering">Catering</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/services?category=debut">Debut</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/services?category=accessories">Accessories</a>
                </div>
                </li>
                <li class="nav-item dropdown mr-3">
                    <a style="color:#505050" class="nav-link dropdown-toggle" href="/rentals" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    RENTALS<span class="arrow-down"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-left dropdown-menu-sm-center py-1 dropdown-services" aria-labelledby="navbarDropdown" style="border-radius: 0">
                    <a class="dropdown-item py-2" href="/rental">CAR</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/clothing">GOWN</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/clothing">BARONG</a>
                    <div class="dropdown-divider my-1"></div>
                    <a class="dropdown-item py-2" href="/clothing">COAT</a>
                </div>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/gallery" style="color:#505050">GALLERY</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/about" style="color:#505050">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact" style="color:#505050">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>