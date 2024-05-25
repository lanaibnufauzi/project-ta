@extends('landing.layouts.main')
@section('title', 'Cart - ')
@section('content')
<div class="page-header breadcrumb-wrap">
    {{-- <div class="container">
        <div class="breadcrumb">
            <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Shop
            <span></span> Cart
        </div>
    </div> --}}
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Buku Pilihan Anda</h1>
            <div class="d-flex justify-content-between">
                {{-- <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">

                            <th scope="col" colspan="2">Product</th>
                            {{-- <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th> --}}
                            <th scope="col" class="end">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $data )
                        <tr class="pt-30">

                            <td class="image product-thumbnail pt-40"><img src="{{ asset('public/cover/' . $data->buku->cover_buku) }}" alt="#"></td>
                            <td class="product-des product-name">
                                <h6 class="mb-5"><a class='product-name mb-10 text-heading' href='shop-product-right.html'>{{ $data->buku->judul_buku }}</a></h6>
                            </td>
                            <form action="/user/cart/{{ $data->buku->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <td class="action text-center" data-title="Remove">
                                    <button type="submit" class="btn btn-sm btn-warning"><i class="fi-rs-trash"></i></button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="divider-2 mb-30"></div>
            <div class="cart-action d-flex justify-content-between">
                @php
                $cek_id_anggota = App\Models\Anggota::where('users_id', Auth::user()->id)->first();
                $cek_pinjaman_pending = App\Models\Pinjaman::where('id_anggota', $cek_id_anggota->id)->where('status', 'pending')->count();
                @endphp
                @if ($cart->count() > 0 && $cek_pinjaman_pending == 0)
                <form action="/user/peminjaman" method="post">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn mr-10 mb-sm-15"><i class="fi-rs-book mr-10"></i>Pinjam</button>
                </form>
                @elseif ($cek_pinjaman_pending == 0 && $cart->count() != 0)
                <form action="/user/peminjaman" method="post">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn mr-10 mb-sm-15"><i class="fi-rs-book mr-10"></i>Pinjam</button>
                </form>
                @elseif ($cek_pinjaman_pending != 0 && $cart->count() != 0)
                <form action="/user/peminjaman/tambahbuku" method="post">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn mr-10 mb-sm-15"><i class="fi-rs-book mr-10"></i>Tambah Buku Ke Pinjaman</button>
                </form>
                @endif
            </div>

        </div>

    </div>
</div>
@endsection
