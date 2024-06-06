﻿@extends('landing.layouts.main')
@section('title', 'Login - ')
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            {{-- <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Beranda</a> --}}
            {{-- <span></span> Pages <span></span> My Account --}}
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <img class="border-radius-15" src="{{ asset('https://cdn.kibrispdr.org/data/786/membaca-buku-di-perpustakaan-kartun-35.jpg') }}" alt="" />
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Masuk</h1>
                                    <p class="mb-30">Belum Memiliki Akun? <a href='/user/register'>Daftar</a></p>
                                </div>
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
                                <form action="/user/login" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <input type="email" value="{{ Session::get('emailLogin') }}" required="" name="email" placeholder="Username or Email *"  />
                                    </div>
                                    <div class="form-group">
                                        <input required="" value="{{ Session::get('passwordLogin') }}" type="password" name="password" placeholder="Your password *" />
                                    </div>

                                    <div class="login_footer form-group mb-50">
                                        {{-- <div hidden class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div> --}}
                                        <a class="text-muted" href="/user/reset-password">Lupa Password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Masuk</button>
                                    </div>
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
