<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CROMA / E_Commerce</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" 
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/headphone.webp') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<div class="container-fluid p-0" style="overflow: visible;">

    <!-- ===== Nav Start ===== -->
    <nav class="navbar navbar-expand-lg py-3 bg-dark">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            
            <!-- Logo + Menu Icon -->
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('img/logo.svg') }}" 
                         alt="Logo" 
                         height="50" 
                         data-aos="zoom-out-down" 
                         data-aos-duration="3000">
                </a>
                <i class="bi bi-list menu-icon text-light fs-2 ms-2" 
                   data-bs-toggle="collapse" 
                   data-bs-target="#navbarSupportedContent"></i>
                <span class="text-light fs-5 ms-1">Menu</span>
            </div>

            <!-- Search Box -->
            <div class="mx-auto my-2 my-lg-0 search-container position-relative">
                <input class="form-control" type="search" id="search" name="search"
                       placeholder=" What are you looking For ?" aria-label="Search">
                <i class="bi bi-search"></i>

                <!-- 🔍 Live Search Results -->
                <div id="searchResults"
                     class="position-absolute bg-white text-dark shadow rounded-3 w-100 mt-2 overflow-hidden"
                     style="z-index: 9999; display: none;">
                </div>
            </div>

            <div class="d-none d-md-flex align-items-center text-light fs-5 me-5">
                <i class="bi bi-geo-alt"></i> Lucknow, 226020
            </div>

            <!-- User Dropdown Start -->
            <div class="dropdown mx-5 d-none d-md-block">
                <button class="btn btn-outline-light d-flex align-items-center dropdown-toggle" 
                        type="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false">
                    <i class="bi bi-person fs-4 me-2"></i> My Profile
                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow-lg p-2" style="min-width: 250px;">
                    <li>
                        <a class="dropdown-item py-2" href="#">
                            <i class="bi bi-geo-alt me-2"></i> My Address
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="{{ route('user.orders') }}">
                            <i class="bi bi-bag-check me-2"></i> My Orders
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="#">
                            <i class="bi bi-gift me-2"></i> My Privilege Offers
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2"
                           href="{{ Auth::check() ? route('wishlist.view') : route('login') }}">
                            <i class="bi bi-heart me-2"></i> My Wishlist
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="#">
                            <i class="bi bi-tools me-2"></i> My Service Request
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>
                    <li>
                        @auth
                            @if (Auth::user()->usertype === 'admin')
                                <a class="dropdown-item py-2" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-person-circle me-2"></i> My Profile
                                </a>
                            @else
                                <a class="dropdown-item py-2" href="{{ route('user.dashboard') }}">
                                    <i class="bi bi-person-circle me-2"></i> My Profile
                                </a>
                            @endif
                        @else
                            <a class="dropdown-item text-danger fw-semibold py-2" 
                               href="#" 
                               data-bs-toggle="modal" 
                               data-bs-target="#loginModal">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>

            <!-- Cart Icon Start -->
            <div class="d-flex align-items-center">
                <a href="/cart" class="text-light position-relative me-4">
                    <i class="bi bi-cart3 fs-4"></i>
                </a>
            </div>

        </div>
    </nav>
    <!-- ===== Nav End ===== -->

    <!-- ===== Side Menu ===== -->
    <div class="side-menu" id="sideMenu">
        <div class="side-menu-header d-flex justify-content-between align-items-center">
            <h4 class="fw-bold mb-0 text-gradient">Welcome</h4>
            <button class="btn-close-white btn-close fs-6" id="closeMenu" aria-label="Close"></button>
        </div>

        <div class="side-menu-content mt-4">
            <a href="/" class="side-link mt-5">
                <i class="bi bi-house-door"></i> Home
            </a>
            <a href="/shop" class="side-link">
                <i class="bi bi-bag"></i> Shop
            </a>
            <a href="/about" class="side-link">
                <i class="bi bi-info-circle"></i> About Us
            </a>
            <a href="/contact" class="side-link">
                <i class="bi bi-telephone"></i> Contact
            </a>

            <hr class="divider">

            <a href="#" class="side-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="bi bi-person-circle"></i> My Account
            </a>
            <a href="/wishlist" class="side-link">
                <i class="bi bi-heart"></i> Wishlist
            </a>
            <a href="/cart" class="side-link">
                <i class="bi bi-cart3"></i> Cart
            </a>
        </div>

        <div class="side-footer text-center mt-auto pt-4 small text-muted">
            © 2025 Croma Clone • Designed by Aviral
        </div>
    </div>

    <!-- Overlay -->
    <div class="menu-overlay" id="menuOverlay"></div>
</div>
