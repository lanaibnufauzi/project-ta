@extends('landing.layouts.main')
@section('title', $buku->judul_buku . ' - ')
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href='shop-grid-right.html'>{{ $buku->kategori->nama_kategori }}</a> <span></span> {{ $buku->judul_buku }}
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="product-detail accordion-detail">
                <div class="row mb-50 mt-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="{{ asset('public/cover/' . $buku->cover_buku) }}" alt="product image" />
                                </figure>
                                {{-- <figure class="border-radius-10">
                                    <img src="{{ asset('landing/assets/imgs/shop/product-16-1.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('landing/assets/imgs/shop/product-16-3.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('landing/assets/imgs/shop/product-16-4.jp') }}g" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('landing/assets/imgs/shop/product-16-5.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('landing/assets/imgs/shop/product-16-6.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ ('landing/assets/imgs/shop/product-16-7.jpg') }}" alt="product image" />
                                </figure> --}}
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="{{ asset('public/cover/' . $buku->cover_buku) }}" alt="product image" /></div>
                                {{-- <div><img src="{{ asset('landing/assets/imgs/shop/thumbnail-4.jpg') }}" alt="product image" />
                            </div>
                            <div><img src="{{ asset('landing/assets/imgs/shop/thumbnail-5.jpg') }}" alt="product image" /></div>
                            <div><img src="{{ asset('landing/assets/imgs/shop/thumbnail-6.jpg') }}" alt="product image" /></div>
                            <div><img src="{{ asset('landing/assets/imgs/shop/thumbnail-7.jpg') }}" alt="product image" /></div>
                            <div><img src="{{ asset('landing/assets/imgs/shop/thumbnail-8.jpg') }}" alt="product image" /></div>
                            <div><img src="{{ asset('landing/assets/imgs/shop/thumbnail-9.jpg') }}" alt="product image" /></div> --}}
                        </div>
                    </div>
                    <!-- End Gallery -->
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="detail-info pr-30 pl-30">
                        <span class="stock-status out-stock"> judul Buku </span>
                        <h2 class="title-detail">{{ $buku->judul_buku }}</h2>
                        <div class="product-detail-rating">
                            {{-- <div class="product-rate-cover text-end">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                            </div> --}}
                        </div>
                        {{-- <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div> --}}
                        {{-- <div class="short-desc mb-30">
                                <p class="font-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi.</p>
                            </div> --}}
                        <div class="attr-detail attr-size mb-30">
                            <strong class="mr-10">Stock: </strong>
                            <ul class="list-filter size-filter font-small">
                                <li><a href="#">
                                        @php
                                        $jumlah_buku_dipinjam = DB::table('pinjaman')
                                        ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
                                        ->where('detail_pinjaman.buku_id', $buku->id)
                                        ->where('pinjaman.status', 'Pinjam')
                                        ->count();

                                        $jumlah_buku_pending = DB::table('pinjaman')
                                        ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
                                        ->where('detail_pinjaman.buku_id', $buku->id)
                                        ->where('pinjaman.status', 'Pending')
                                        ->count();

                                        $jumlah_buku = $buku->stok - $jumlah_buku_dipinjam - $jumlah_buku_pending;
                                        @endphp

                                        {{ $jumlah_buku }}
                                    </a></li>

                            </ul>
                        </div>
                        <div class="detail-extralink mb-50">
                            <div class="detail-qty border radius">
                                {{-- <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a> --}}
                                <input type="number" name="quantity" class="qty-val" value="1" min="1" max="1">
                                {{-- <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a> --}}
                            </div>
                            <div class="product-extra-link2">
                                <form action="/user/cart/{{ $buku->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Tambahkan Buku</button>
                                    {{-- <a aria-label='Add To Wishlist' class='action-btn hover-up' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                    <a aria-label='Compare' class='action-btn hover-up' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a> --}}
                                </form>
                            </div>
                        </div>
                        <div class="font-xs">
                            <ul class="mr-50 float-start">
                                <li class="mb-5">Tema : <span class="text-brand">{{ $buku->tema }}</span></li>
                                <li class="mb-5">Kategori : <span class="text-brand"> {{ $buku->kategori->nama_kategori }}</span></li>
                                <li>Penerbit : <span class="text-brand"> {{ $buku->penerbit }}</span></li>
                            </ul>
                            {{-- <ul class="float-start">
                                    <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                    <li class="mb-5">Tags: <a href="#" rel="tag">Snack</a>, <a href="#" rel="tag">Organic</a>, <a href="#" rel="tag">Brown</a></li>
                                    <li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span></li>
                                </ul> --}}
                        </div>
                    </div>
                    <!-- Detail Info -->
                </div>
            </div>
            <div class="product-info">
                <div class="tab-style3">
                    <ul class="nav nav-tabs text-uppercase">
                        <li class="nav-item">
                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                            </li> --}}
                        {{-- <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                            </li> --}}
                    </ul>
                    <div class="tab-content shop_info_tab entry-main-content">
                        <div class="tab-pane fade show active" id="Description">
                            <div class="">
                                <p id="enkripsi-deskripsi">{{ $buku->deskripsi }}</p>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="Additional-info">
                            <table class="font-md">
                                <tbody>
                                    <tr class="stand-up">
                                        <th>Jumlah Halaman</th>
                                        <td>
                                            <p>{{ $buku->jumlah_halaman }}</p>
                                        </td>
                                    </tr>
                                    <tr class="stand-up">
                                        <th>Tema</th>
                                        <td>
                                            <p>{{ $buku->tema }}</p>
                                        </td>
                                    </tr>
                                    <tr class="stand-up">
                                        <th>Kategori</th>
                                        <td>
                                            <p>{{ $buku->kategori->nama_kategori }}</p>
                                        </td>
                                    </tr>
                                    <tr class="folded-wo-wheels">
                                        <th>Penerbit</th>
                                        <td>
                                            <p>{{ $buku->penerbit }}</p>
                                        </td>
                                    </tr>
                                    <tr class="folded-w-wheels">
                                        <th>Tanggal Terbit</th>
                                        <td>
                                            <p>{{ $buku->tgl_terbit }}</p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="tab-pane fade" id="Vendor-info">
                            <div class="vendor-logo d-flex mb-30">
                                <img src="assets/imgs/vendor/vendor-18.svg" alt="" />
                                <div class="vendor-name ml-15">
                                    <h6>
                                        <a href='vendor-details-2.html'>Noodles Co.</a>
                                    </h6>
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                            </div> --}}
                        {{-- <ul class="contact-infor mb-50">
                                <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>(+91) - 540-025-553</span></li>
                            </ul>
                            <div class="d-flex mb-55">
                                <div class="mr-30">
                                    <p class="text-brand font-xs">Rating</p>
                                    <h4 class="mb-0">92%</h4>
                                </div>
                                <div class="mr-30">
                                    <p class="text-brand font-xs">Ship on time</p>
                                    <h4 class="mb-0">100%</h4>
                                </div>
                                <div>
                                    <p class="text-brand font-xs">Chat response</p>
                                    <h4 class="mb-0">89%</h4>
                                </div>
                            </div>
                            <p>Noodles & Company is an American fast-casual restaurant that offers international and American noodle dishes and pasta in addition to soups and salads. Noodles & Company was founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The company went public in 2013 and recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles & Company locations across 29 states and Washington, D.C.</p>
                        </div>
                    </div>
                </div>
            </div> --}}
                        <div class="row mt-60">
                            <div class="col-12">
                                <h2 class="section-title style-1 mb-30">Buku Lain</h2>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach ($relate_buku as $item )


                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href='/user/detail-product/{{ $item->id }}' tabindex='0'>
                                                        <img class="default-img" src="{{ asset('public/cover/' . $item->cover_buku) }}" alt="" />
                                                        <img class="hover-img" src="{{ asset('public/cover/' . $item->cover_buku) }}" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label='Add To Wishlist' class='action-btn' href='shop-wishlist.html'><i class="fi-rs-heart"></i></a>
                                                    {{-- <a aria-label='Compare' class='action-btn' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a> --}}
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Buku Lain</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href='/user/detail-product/{{ $item->id }}' tabindex='0'>{{ $item->judul_buku }}</a></h2>
                                                {{-- <div class="rating-result" title="90%">
                                        <span> </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
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
    // ketika klik kanan hasil copy akan di enkripsi dengan aes 128
    document.addEventListener('copy', function(e) {
        var selection = window.getSelection();
        e.clipboardData.setData('text/plain', selection.toString().replace(/./g, '*'));
        e.preventDefault();
    });

</script>
@endsection
