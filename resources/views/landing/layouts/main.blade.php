<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from nest-frontend-v6.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 May 2024 17:28:56 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title') E Library - Sistem Informasi Perpustakan SMK Al Munawaroh</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landing/logo/logo-aja.png') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('landing/assets/css/main5103.css?v=6.0') }}" />
</head>

<body>
    <!-- Modal -->
    {{-- <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="deal" style="background-image: url('assets/imgs/banner/popup-1.png')">
                        <div class="deal-top">
                            <h6 class="mb-10 text-brand-2">Deal of the Day</h6>
                        </div>
                        <div class="deal-content detail-info">
                            <h4 class="product-title"><a class='text-heading' href='shop-product-right.html'>Organic fruit for your family's health</a></h4>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="deal-bottom">
                            <p class="mb-20">Hurry Up! Offer End In:</p>
                            <div class="deals-countdown pl-5" data-countdown="2025/03/25 00:00:00">
                                <span class="countdown-section"><span class="countdown-amount hover-up">03</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">02</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span class="countdown-amount hover-up">43</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">29</span><span class="countdown-period"> sec </span></span>
                            </div>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 rates)</span>
                                </div>
                            </div>
                            <a class='btn hover-up' href='shop-grid-right.html'>Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Quick view -->
    {{-- <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-2.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                    <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                    <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                    <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                    <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                    <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                    <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> Sale Off </span>
                                <h3 class="title-detail"><a class='text-heading' href='shop-product-right.html'>Seeds of Change Organic Quinoa, Brown</a></h3>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">$38</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                            <span class="old-price font-md ml-15">$52</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                        <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2024</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @include('landing.partials.header')
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href='/'><img src="{{ asset('landing/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href='index.html'>Beranda</a>
                                {{-- <ul class="dropdown">
                                    <li><a href='index.html'>Home 1</a></li>
                                    <li><a href='index-2.html'>Home 2</a></li>
                                    <li><a href='index-3.html'>Home 3</a></li>
                                    <li><a href='index-4.html'>Home 4</a></li>
                                    <li><a href='index-5.html'>Home 5</a></li>
                                    <li><a href='index-6.html'>Home 6</a></li>
                                </ul> --}}
                            </li>
                            {{-- <li class="menu-item-has-children">
                                <a href='shop-grid-right.html'>shop</a>
                                <ul class="dropdown">
                                    <li><a href='shop-grid-right.html'>Shop Grid – Right Sidebar</a></li>
                                    <li><a href='shop-grid-left.html'>Shop Grid – Left Sidebar</a></li>
                                    <li><a href='shop-list-right.html'>Shop List – Right Sidebar</a></li>
                                    <li><a href='shop-list-left.html'>Shop List – Left Sidebar</a></li>
                                    <li><a href='shop-fullwidth.html'>Shop - Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product</a>
                                        <ul class="dropdown">
                                            <li><a href='shop-product-right.html'>Product – Right Sidebar</a></li>
                                            <li><a href='shop-product-left.html'>Product – Left Sidebar</a></li>
                                            <li><a href='shop-product-full.html'>Product – No sidebar</a></li>
                                            <li><a href='shop-product-vendor.html'>Product – Vendor Infor</a></li>
                                        </ul>
                                    </li>
                                    <li><a href='shop-filter.html'>Shop – Filter</a></li>
                                    <li><a href='shop-wishlist.html'>Shop – Wishlist</a></li>
                                    <li><a href='shop-cart.html'>Shop – Cart</a></li>
                                    <li><a href='shop-checkout.html'>Shop – Checkout</a></li>
                                    <li><a href='shop-compare.html'>Shop – Compare</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Invoice</a>
                                        <ul class="dropdown">
                                            <li><a href='shop-invoice-1.html'>Shop Invoice 1</a></li>
                                            <li><a href='shop-invoice-2.html'>Shop Invoice 2</a></li>
                                            <li><a href='shop-invoice-3.html'>Shop Invoice 3</a></li>
                                            <li><a href='shop-invoice-4.html'>Shop Invoice 4</a></li>
                                            <li><a href='shop-invoice-5.html'>Shop Invoice 5</a></li>
                                            <li><a href='shop-invoice-6.html'>Shop Invoice 6</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Vendors</a>
                                <ul class="dropdown">
                                    <li><a href='vendors-grid.html'>Vendors Grid</a></li>
                                    <li><a href='vendors-list.html'>Vendors List</a></li>
                                    <li><a href='vendor-details-1.html'>Vendor Details 01</a></li>
                                    <li><a href='vendor-details-2.html'>Vendor Details 02</a></li>
                                    <li><a href='vendor-dashboard.html'>Vendor Dashboard</a></li>
                                    <li><a href='vendor-guide.html'>Vendor Guide</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Mega menu</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href='shop-product-right.html'>Dresses</a></li>
                                            <li><a href='shop-product-right.html'>Blouses & Shirts</a></li>
                                            <li><a href='shop-product-right.html'>Hoodies & Sweatshirts</a></li>
                                            <li><a href='shop-product-right.html'>Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href='shop-product-right.html'>Jackets</a></li>
                                            <li><a href='shop-product-right.html'>Casual Faux Leather</a></li>
                                            <li><a href='shop-product-right.html'>Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href='shop-product-right.html'>Gaming Laptops</a></li>
                                            <li><a href='shop-product-right.html'>Ultraslim Laptops</a></li>
                                            <li><a href='shop-product-right.html'>Tablets</a></li>
                                            <li><a href='shop-product-right.html'>Laptop Accessories</a></li>
                                            <li><a href='shop-product-right.html'>Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='blog-category-fullwidth.html'>Blog</a>
                                <ul class="dropdown">
                                    <li><a href='blog-category-grid.html'>Blog Category Grid</a></li>
                                    <li><a href='blog-category-list.html'>Blog Category List</a></li>
                                    <li><a href='blog-category-big.html'>Blog Category Big</a></li>
                                    <li><a href='blog-category-fullwidth.html'>Blog Category Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product Layout</a>
                                        <ul class="dropdown">
                                            <li><a href='blog-post-left.html'>Left Sidebar</a></li>
                                            <li><a href='blog-post-right.html'>Right Sidebar</a></li>
                                            <li><a href='blog-post-fullwidth.html'>No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href='page-about-2.html'>About Us</a></li>
                                    <li><a href='page-contact.html'>Contact</a></li>
                                    <li><a href='page-account.html'>My Account</a></li>
                                    <li><a href='page-login.html'>Login</a></li>
                                    <li><a href='page-register.html'>Register</a></li>
                                    <li><a href='page-forgot-password.html'>Forgot password</a></li>
                                    <li><a href='page-reset-password.html'>Reset password</a></li>
                                    <li><a href='page-purchase-guide.html'>Purchase Guide</a></li>
                                    <li><a href='page-privacy-policy.html'>Privacy Policy</a></li>
                                    <li><a href='page-terms.html'>Terms of Service</a></li>
                                    <li><a href='page-404.html'>404 Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                {{-- <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href='page-contact.html'><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href='page-login.html'><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div> --}}
                <div class="site-copyright">Copyright 2024 © Nest. All rights reserved. Powered by AliThemes.</div>
            </div>
        </div>
    </div>
    <!--End header-->
    <main class="main">
        @yield('content')
    </main>
    @include('landing.partials.footer')
    <!-- Preloader Start -->
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('landing/assets/imgs/theme/loading.gif') }}" alt="" />
    </div>
    </div>
    </div>
    </div> --}}
    <!-- Vendor JS-->
    <script src="{{ asset('landing/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('landing/assets/js/main5103.js?v=6.0') }}"></script>
    <script src="{{ asset('landing/assets/js/shop5103.js?v=6.0') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('script')

    @if(Session::get('login'))
    <script>
        swal.fire("Done!"
            , "Login Berhasil"
            , "success"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('logingagal'))
    <script>
        swal.fire("Gagal!"
            , "Login Gagal"
            , "error"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('register'))
    <script>
        swal.fire("Done!"
            , "Register Berhasil"
            , "success"
            , {
                button: "OK"
            , });

    </script>
    @endif


    @if(Session::get('logout'))
    <script>
        swal.fire("Done!"
            , "Logout Berhasil"
            , "success"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('deletecart'))
    <script>
        swal.fire("Done!"
            , "Data Berhasil Dihapus"
            , "success"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('storecart'))
    <script>
        swal.fire("Done!"
            , "Data Berhasil Ditambahkan"
            , "success"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('deletewish'))
    <script>
        swal.fire("Done!"
            , "Data Berhasil Dihapus"
            , "success"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('storewish'))
    <script>
        swal.fire("Done!"
            , "Data Berhasil Ditambahkan"
            , "success"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('pinjam'))
    <script>
        swal.fire("Done!"
            , "Peminjaman Buku Berhasil"
            , "success"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('gagalwish'))
    <script>
        swal.fire("Gagal!"
            , "Buku Sedang Dipinjam"
            , "error"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('gagalcart'))
    <script>
        swal.fire("Gagal!"
            , "Buku Sedang Dipinjam"
            , "error"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('stoktidakada'))
    <script>
        swal.fire("Gagal!"
            , "Stok Buku Tidak Tersedia"
            , "error"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('sudahmeminjam'))
    <script>
        swal.fire("Gagal!"
            , "Buku Sudah Dipinjam"
            , "error"
            , {
                button: "OK"
            , });

    </script>
    @endif

    @if(Session::get('updateprofil'))
    <script>
        swal.fire("Done!"
            , "Profil Berhasil Diupdate"
            , "success"
            , {
                button: "OK"
            , });

    </script>
    @endif
</body>


<!-- Mirrored from nest-frontend-v6.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 May 2024 17:30:15 GMT -->
</html>
