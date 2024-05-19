﻿@extends('landing.layouts.main')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> My Account
        </div>
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
                                    <h1 class="mb-5">Create an Account</h1>
                                    <p class="mb-30">Already have an account? <a href='/user/login'>Login</a></p>
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
                                <form action="/user/register" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <input type="text" required="" name="name" placeholder="Name" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" name="email" placeholder="Email" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" name="no_handphone" placeholder="No Handphone" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" name="alamat" placeholder="Alamat" />
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" name="password" placeholder="Password" />
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" name="repassword" placeholder="Confirm password" />
                                    </div>
                                    {{-- <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <input type="text" required="" name="email" placeholder="Security code *" />
                                        </div>
                                        <span class="security-code">
                                            <b class="text-new">8</b>
                                            <b class="text-hot">6</b>
                                            <b class="text-sale">7</b>
                                            <b class="text-best">5</b>
                                        </span>
                                    </div> --}}


                                    <div class="form-group mb-30">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                    </div>
                                    <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <div class="card-login mt-115">
                            <a href="#" class="social-login facebook-login">
                                <img src="{{ asset('landing/assets/imgs/theme/icons/logo-facebook.svg') }}" alt="" />
                                <span>Continue with Facebook</span>
                            </a>
                            <a href="#" class="social-login google-login">
                                <img src="{{ asset('landing/assets/imgs/theme/icons/logo-google.svg') }}" alt="" />
                                <span>Continue with Google</span>
                            </a>
                            <a href="#" class="social-login apple-login">
                                <img src="{{ asset('landing/assets/imgs/theme/icons/logo-apple.svg') }}" alt="" />
                                <span>Continue with Apple</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection