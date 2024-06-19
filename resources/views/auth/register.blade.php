<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perpustakaan AM</title>
    <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #c2c9cd;
            color: #fff;
        }

        .container-scroller {
            overflow: hidden;
            min-height: 100vh;
        }

        .auth-form-wrapper {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
            margin: auto;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .brand-logo {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
            display: block;
            margin-bottom: 20px;
        }

        .auth-form-btn {
            background: #28a745;
            color: #fff;
        }

        .auth-link {
            color: #000;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .mt-3 {
            margin-top: 15px;
        }

    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="auth-form-wrapper text-left p-4">
            <a class="brand-logo" href="/dashboard"></a>
            <form class="pt-3" method="POST" action="{{ route('register.create') }}">
                <div class="brand-logo text-center">
                    <a class="navbar-brand" href="/dashboard">
                        <img src="{{ asset('image/logosekolah.png') }}">
                    </a>
                </div>
                @csrf
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-2">



                    <?php

            $nomer = 1;

            ?>

                    @foreach($errors->all() as $error)
                    <li>{{ $nomer++ }}. {{ $error }}</li>
                    @endforeach
                </div>

                @endif

                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="no_handpone" placeholder="Masukkan No Handphone">
                </div>
                <div class="form-group">
                    <input type="alamat" class="form-control" name="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/todolist.js') }}"></script>
    <!-- endinject -->

    @if(Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'gagal register'
        , });

    </script>
    @endif
</body>

</html>
