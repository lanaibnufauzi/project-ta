<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perpustakaan AM</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-l2bhfvJ5J9Nl2E0bKKZzN2P6lxFZoFgJiTRvXGGymUKjz2+b8sW4Xb9uJXqIfQeX" crossorigin="anonymous">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #3498db;
            font-family: 'Arial', sans-serif;
        }

        .container-scroller {
            height: 100vh;
        }

        .content-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .auth-form-light {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .brand-logo a {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            background-color: #eee;
            border: none;
            border-radius: 4px;
            padding: 10px;
            color: #555;
        }

        .btn-primary {
            background-color: #2980b9;
            border: none;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #2575a8;
        }

        .auth-link {
            color: #333;
        }

        .auth-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="content-wrapper">
            <div class="auth-form-light">
                <div class="brand-logo">
                    <a class="navbar-brand" href="/dashboard">Perpustkaan AM</a>
                </div>
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                    @csrf
                    @if (session('status') && session('message'))
                    <div class="alert alert-{{ session('status') }}">
                        {{ session('message') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="email" class="form-control name" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control name" id="exampleInputPassword" name="password" placeholder="Password">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <label class="form-check-label text-muted">
                                <input type="checkbox" class="form-check-input">
                                Biarkan Saya Tetap Masuk
                            </label>
                        </div>
                        <a href="#" class="auth-link">Lupa Password?</a>
                    </div>
                    <div class="text-center mt-4 font-weight-light">
                        Sudah Memiliki akun? <a href="{{ route('register') }}" class="auth-link">Daftar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- endinject -->
</body>

</html>
