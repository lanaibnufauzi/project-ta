@extends('landing.layouts.main')
@section('title', 'Wishlist - ')
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        {{-- <div class="breadcrumb">
            <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Shop <span></span> Fillter
        </div> --}}
    </div>
</div>
<div class="container mb-30 mt-50">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="mb-50">
                <h1 class="heading-2 mb-10">Buku Yang Kamu Pillih</h1>
                {{-- <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6> --}}
            </div>
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                <label class="form-check-label" for="exampleCheckbox11"></label>
                            </th>
                            <th scope="col" colspan="2">Product</th>

                            <th scope="col">Action</th>
                            <th scope="col" class="end">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlist as $data )
                        <tr class="pt-30">

                            <td class="custome-checkbox pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                <label class="form-check-label" for="exampleCheckbox1"></label>
                            </td>
                            <td class="image product-thumbnail pt-40"><img src="{{ asset('public/cover/' . $data->buku->cover_buku) }}" alt="#" /></td>
                            <td class="product-des product-name">


                                <h6><a class='product-name mb-10' href='shop-product-right.html'>{{ $data->buku->judul_buku }}</a></h6>

                                {{-- <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div> --}}
                            </td>


                            <td class="text-right" data-title="Cart">
                                <form action="/user/cart/{{ $data->buku->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm">Tambahkan Buku</button>
                                </form>


                            </td>
                            <td class="action text-center" data-title="Remove">
                                <form id="whislistdelete{{ $data->id }}" action="/user/wishlist/{{ $data->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <script>
                                        function wishlist(id) {
                                            document.getElementById('whislistdelete' + id).submit();
                                        }

                                    </script>
                                    <a href='javascript:wishlist({{ $data->id }})' class="text-body"><i class="fi-rs-trash"></i></a>
                                </form>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
