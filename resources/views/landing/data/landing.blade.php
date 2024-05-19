@foreach ($buku as $buku )

<div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href='/user/detail-product/{{ $buku->id }}'>
                    <img class="default-img" src="{{ asset('public/cover/' . $buku->cover_buku) }}" alt="" />
                    <img class="hover-img" src="{{ asset('public/cover/' . $buku->cover_buku) }}" alt="" />
                </a>
            </div>
            <div class="product-action-1">
                <form id="wishlist-form{{ $buku->id }}" action="/user/wishlist/{{ $buku->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <script>
                        function wishlist(id) {
                            document.getElementById('wishlist-form' + id).submit();
                        }

                    </script>
                    <a aria-label='Add To Wishlist' class='action-btn' href='javascript:wishlist({{ $buku->id }})'><i class="fi-rs-heart"></i></a>
                    {{-- <a aria-label='Compare' class='action-btn' href='shop-compare.html'><i class="fi-rs-shuffle"></i></a> --}}
                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $buku->id }}"><i class="fi-rs-eye"></i></a>
                </form>


            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
                <a href='shop-grid-right.html'>{{ $buku->kategori->nama_kategori }}</a>
            </div>
            <h2><a href='/user/detail-product/{{ $buku->id }}'>{{ $buku->judul_buku }}</a></h2>
            <div class="product-rate-cover">
                <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
                <span class="font-small ml-5 text-muted"> (4.0)</span>
            </div>
            <div>
                <span class="font-small text-muted">By <a href='vendor-details-1.html'>{{ $buku->penerbit }}</a></span>
            </div>
            <div class="product-card-bottom">
                {{-- <div class="product-price">
                    <span>$28.85</span>
                    <span class="old-price">$32.8</span>
                </div> --}}
                <div class="add-cart">
                    <form action="/user/cart/{{ $buku->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-success"><i class="fi-rs-shopping-cart mr-5"></i>Add</button>
                        {{-- <a class='add' href='shop-cart.html'><i class="fi-rs-shopping-cart mr-5"></i>Add </a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick view -->
<div class="modal fade custom-modal" id="quickViewModal{{ $buku->id }}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
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
                                    <img src="{{ asset('landing/assets/imgs/shop/product-16-4.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('landing/assets/imgs/shop/product-16-5.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('landing/assets/imgs/shop/product-16-6.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('landing/assets/imgs/shop/product-16-7.jpg') }}" alt="product image" />
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
                        <span class="stock-status out-stock"> Sale Off </span>
                        <h3 class="title-detail"><a class='text-heading' href='/user/detail-buku/{{ $buku->id }}'>{{ $buku->judul_buku }}</a></h3>
                        <div class="product-detail-rating">
                            <div class="product-rate-cover text-end">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                            </div>
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
                        <div class="detail-extralink mb-30">
                            <div class="detail-qty border radius">
                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                <span class="qty-val">1</span>
                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                            </div>
                            <div class="product-extra-link2">
                                <form action="/user/cart/{{ $buku->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </form>
                            </div>
                        </div>
                        <div class="font-xs">
                            <ul>
                                <li class="mb-5">Vendor: <span class="text-brand">{{ $buku->penerbit }}</span></li>
                                <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2024</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Detail Info -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach
