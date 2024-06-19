@extends('landing.layouts.main')
@section('title', 'Ubah Password - ')
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        {{-- <div class="breadcrumb">
            <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> My Account
        </div> --}}
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Ubah Password</h1>

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
                                </div>
                                <form action="/user/change-password" method="post">
                                    @csrf
                                    @method('POST')
                                    <input hidden name="code" value="{{ $user->code }}" type="text">
                                    <div class="form-group">
                                        <input required="" type="password" name="password" placeholder="Password" />
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" name="repassword" placeholder="Confirm password" />
                                    </div>

                                    <div class="form-group mb-30">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Ganti Password</button>
                                    </div>
                                    <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#no_hanpdhone').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });

</script>

<script>
    // cek email apakah aktif atau tidak

</script>
@endsection
