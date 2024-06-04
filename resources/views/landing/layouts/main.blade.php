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
    @include('landing.partials.header')
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href='/'><img src="{{ asset('landing/logo/logo-aja.png') }}" alt="logo" /></a>
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
                    <form action="/" method="GET">
                        <input name="nama_buku" type="text" placeholder="Search for items..." />
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
                            <li class="menu-item-has-children"><span class="menu-expand"><i class="fi-rs-angle-small-down"></i></span>
                                <a href="#">Account</a>
                                <ul class="dropdown" style="display: none;">
                                    @if (Auth::check() && Auth::user()->role->name == 'user')
                                    <li>
                                        <a href='/user/account'><i class="fi fi-rs-user mr-10"></i>Akun Saya</a>
                                    </li>
                                    <li>
                                        <a href='/user/logout'><i class="fi fi-rs-sign-out mr-10"></i>Kluar</a>
                                    </li>
                                    @else
                                    <li>
                                        <a href='/user/login'><i class="fi fi-rs-user mr-10"></i>Login / Register</a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="site-copyright">Copyright 2024 © Nest. All rights reserved. Powered by AliThemes.</div>
            </div>
        </div>
    </div>
    <!--End header-->
    <main class="main">
        @yield('content')
    </main>
    @include('landing.partials.footer')

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
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Login Berhasil'
            , icon: 'success'
            , timer: 1000
            , showConfirmButton: false
        });

    </script>
    @endif

    @if(Session::get('logingagal'))
    <script>
        Swal.fire({
            title: 'Gagal!'
            , text: 'Login Gagal'
            , icon: 'error'
            , timer: 1000
            , showConfirmButton: false
        });

    </script>
    @endif

    @if(Session::get('register'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Register Berhasil'
            , icon: 'success'
            , timer: 1000
            , showConfirmButton: false
        });

    </script>
    @endif


    @if(Session::get('logout'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Logout Berhasil'
            , icon: 'success'
            , timer: 1000
            , showConfirmButton: false
        });

    </script>
    @endif

    @if(Session::get('deletecart'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Data Berhasil Dihapus'
            , icon: 'success'
            , timer: 1000
            , showConfirmButton: false
        });

    </script>
    @endif

    @if(Session::get('storecart'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Data Berhasil Ditambahkan'
            , icon: 'success'
            , timer: 1000
            , showConfirmButton: false
        });

    </script>
    @endif

    @if(Session::get('deletewish'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Data Berhasil Dihapus'
            , icon: 'success'
            , timer: 1000
            , showConfirmButton: false
        });

    </script>
    @endif

    @if(Session::get('storewish'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Data Berhasil Ditambahkan'
            , icon: 'success'
            , timer: 1000
            , showConfirmButton: false
        });

    </script>
    @endif

    @if(Session::get('pinjam'))
    <script>
        Swal.fire({
            title: 'Berhasil!'
            , text: 'Buku Berhasil Dipinjam'
            , icon: 'success'
            , timer: 1000
            , showConfirmButton: false
        });

    </script>
    @endif

    @if(Session::get('gagalwish'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Gagal Menambahkan Wishlist'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('gagalcart'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Gagal Menambahkan Cart'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('stoktidakada'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Stok Tidak Tersedia'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('sudahmeminjam'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Buku Sudah Dipinjam'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('updateprofil'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'success'
            , title: 'Berhasil Diupdate'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('tambahanbuku'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'success'
            , title: 'Buku Berhasil Ditambahkan'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('sudahmeminjampending'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Anda Memiliki Pinjaman Pending'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif
    @if(Session::get('batalpinjam'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'success'
            , title: 'Berhasil Membatalkan Peminjaman'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif
    @if(Session::get('harusgmail'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Harus Menggunakan Gmail'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('resetpasswordberhasil'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'success'
            , title: 'Reset Password Berhasil'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('linkkadaluarsa'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Link Sudah Kadaluarsa'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('linkresetpassword'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Link Reset Password Salah'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('emailtidakditemukan'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Email Tidak Ditemukan'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif

    @if(Session::get('maxpinjam'))
    <script>
        // tidak usah tombol oke, berikan waktu 1 detik
        Swal.fire({
            icon: 'error'
            , title: 'Maksimal peminjaman hanya 2'
            , showConfirmButton: false
            , timer: 1000
        , });

    </script>
    @endif








</body>


<!-- Mirrored from nest-frontend-v6.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 May 2024 17:30:15 GMT -->
</html>
