@extends('landing.layouts.main')
@section('title', 'Cart - ')
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Shop
            <span></span> Cart
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Your Cart</h1>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
                <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                <label class="form-check-label" for="exampleCheckbox11"></label>
                            </th>
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
                            <td class="custome-checkbox pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                <label class="form-check-label" for="exampleCheckbox1"></label>
                            </td>
                            <td class="image product-thumbnail pt-40"><img src="{{ asset('landing/assets/imgs/shop/product-1-1.jpg') }}" alt="#"></td>
                            <td class="product-des product-name">
                                <h6 class="mb-5"><a class='product-name mb-10 text-heading' href='shop-product-right.html'>{{ $data->buku->judul_buku }}</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:90%">
                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            {{-- <td class="price" data-title="Price">
                                <h4 class="text-body">$2.51 </h4>
                            </td> --}}
                            {{-- <td class="text-center detail-info" data-title="Stock">
                                <div class="detail-extralink mr-15">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                </div>
                            </td> --}}
                            {{-- <td class="price" data-title="Price">
                                <h4 class="text-brand">$2.51 </h4>
                            </td> --}}
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
                @if ($cart->count() > 0)
                <form action="/user/peminjaman" method="post">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn  mr-10 mb-sm-15"><i class="fi-rs-book mr-10"></i>Pinjam</button>
                </form>
                @else
                @endif
            </div>

        </div>

    </div>
</div>
@endsection
