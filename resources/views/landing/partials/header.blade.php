<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href='/'><img src="{{ asset('landing/logo/logo-aja.png') }}" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="/" method="GET">
                            <select name="id_kategori" class="select-active">
                                <option value="">All Categories</option>
                                @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <input name="nama_buku" type="text" placeholder="Search for items..." />
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">

                            @if(Auth::check() && Auth::user()->role->name == 'user')
                            <div class="header-action-icon-2">
                                <a href='shop-wishlist.html'>
                                    <img class="svgInject" alt="Nest" src="{{ asset('landing/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count blue">
                                        @php
                                        $jumlah_wishlist = \App\Models\Wishlist::where('id_user', Auth::user()->id)->count();
                                        @endphp
                                        {{ $jumlah_wishlist }}
                                    </span>
                                </a>
                                <a href='/user/wishlist'><span class="lable">Wishlist</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class='mini-cart-icon' href='/user/wishlist'>
                                    <img alt="Nest" src="{{ asset('landing/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue">
                                        @php
                                        $jumlah_cart = \App\Models\Cart::where('id_user', Auth::user()->id)->count();
                                        @endphp
                                        {{ $jumlah_cart }}
                                    </span>
                                </a>
                                <a href='/user/cart'><span class="lable">Cart</span></a>

                            </div>
                            @else
                            @endif

                            <div class="header-action-icon-2">
                                <a href='page-account.html'>
                                    <img class="svgInject" alt="Nest" src="{{ asset('landing/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                <a href='page-account.html'><span class="lable ml-0">Account</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        @if (Auth::check() && Auth::user()->role->name == 'user')
                                        <li>
                                            <a href='/user/account'><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                        </li>
                                        <li>
                                            <a href='/user/logout'><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href='/user/login'><i class="fi fi-rs-user mr-10"></i>Login / Register</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href='/'><img src="{{ asset('landing/logo/logo-aja.png') }}" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">

                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>

                                <li>
                                    <a class='active' href='/'>Home</a>

                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">

                        @if(Auth::check() && Auth::user()->role->name == 'user')
                        <div class="header-action-icon-2">
                            <a href='shop-wishlist.html'>
                                <img class="svgInject" alt="Nest" src="{{ asset('landing/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count blue">
                                    @php
                                    $jumlah_wishlist = \App\Models\Wishlist::where('id_user', Auth::user()->id)->count();
                                    @endphp
                                    {{ $jumlah_wishlist }}
                                </span>
                            </a>
                            <a href='/user/wishlist'><span class="lable">Favorit</span></a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class='mini-cart-icon' href='/user/wishlist'>
                                <img alt="Nest" src="{{ asset('landing/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count blue">
                                    @php
                                    $jumlah_cart = \App\Models\Cart::where('id_user', Auth::user()->id)->count();
                                    @endphp
                                    {{ $jumlah_cart }}
                                </span>
                            </a>
<<<<<<< HEAD
                            <a href='/user/cart'><span class="lable">Cart</span></a>

                        </div>
                        @else
                        @endif

                        {{-- <div class="header-action-icon-2">
                            <a href='page-account.html'>
                                <img class="svgInject" alt="Nest" src="{{ asset('landing/assets/imgs/theme/icons/icon-user.svg') }}" />
                            </a>
                            <a href='page-account.html'><span class="lable ml-0">Account</span></a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
=======
                            <a href='/user/cart'><span class="lable">Keranjang</span></a>
                            {{-- <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href='shop-product-right.html'><img alt="Nest" src="{{ asset('landing/assets/imgs/shop/thumbnail-3.jpg') }}" /></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href='shop-product-right.html'>Daisy Casual Bag</a></h4>
                            <h4><span>1 × </span>$800.00</h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                        </div>
                        </li>
                        <li>
                            <div class="shopping-cart-img">
                                <a href='shop-product-right.html'><img alt="Nest" src="{{ asset('landing/assets/imgs/shop/thumbnail-2.jpg') }}" /></a>
                            </div>
                            <div class="shopping-cart-title">
                                <h4><a href='shop-product-right.html'>Corduroy Shirts</a></h4>
                                <h4><span>1 × </span>$3200.00</h4>
                            </div>
                            <div class="shopping-cart-delete">
                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                            </div>
                        </li>
                        </ul>
                        <div class="shopping-cart-footer">
                            <div class="shopping-cart-total">
                                <h4>Total <span>$4000.00</span></h4>
                            </div>
                            <div class="shopping-cart-button">
                                <a class='outline' href='shop-cart.html'>View cart</a>
                                <a href='shop-checkout.html'>Checkout</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                @else
                @endif

                <div class="header-action-icon-2">
                    <a href='page-account.html'>
                        <img class="svgInject" alt="Nest" src="{{ asset('landing/assets/imgs/theme/icons/icon-user.svg') }}" />
                    </a>
                    <a href='page-account.html'><span class="lable ml-0">Account</span></a>
                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                        <ul>
                            @if (Auth::check() && Auth::user()->role->name == 'user')
                            <li>
                                <a href='/user/account'><i class="fi fi-rs-user mr-10"></i>Akun Saya</a>
                            </li>
                            <li>
                                <a href='/user/logout'><i class="fi fi-rs-sign-out mr-10"></i>Keluar</a>
                            </li>
                            @else
                            <li>
                                <a href='/user/login'><i class="fi fi-rs-user mr-10"></i>Login / Register</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href='/'><img src="{{ asset('landing/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    {{-- <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
>>>>>>> 210352d00457f9497310f42c5a99e21f36f15ea5
                                <ul>
                                    @if (Auth::check() && Auth::user()->role->name == 'user')
                                    <li>
<<<<<<< HEAD
                                        <a href='/user/account'><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                    </li>
                                    <li>
                                        <a href='/user/logout'><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                    </li>
                                    @else
                                    <li>
                                        <a href='/user/login'><i class="fi fi-rs-user mr-10"></i>Login / Register</a>
                                    </li>
                                    @endif
=======
                                        <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-1.svg') }}" alt="" />Milks and Dairies</a>
                    </li>
                    <li>
                        <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-2.svg') }}" alt="" />Clothing & beauty</a>
                    </li>
                    <li>
                        <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-3.svg') }}" alt="" />Pet Foods & Toy</a>
                    </li>
                    <li>
                        <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-4.svg') }}" alt="" />Baking material</a>
                    </li>
                    <li>
                        <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-5.svg') }}" alt="" />Fresh Fruit</a>
                    </li>
                    </ul>
                    <ul class="end">
                        <li>
                            <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-6.svg') }}" alt="" />Wines & Drinks</a>
                        </li>
                        <li>
                            <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-7.svg') }}" alt="" />Fresh Seafood</a>
                        </li>
                        <li>
                            <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-8.svg') }}" alt="" />Fast food</a>
                        </li>
                        <li>
                            <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-9.svg') }}" alt="" />Vegetables</a>
                        </li>
                        <li>
                            <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/category-10.svg') }}" alt="" />Bread and Juice</a>
                        </li>
                    </ul>
                </div>
                <div class="more_slide_open" style="display: none">
                    <div class="d-flex categori-dropdown-inner">
                        <ul>
                            <li>
                                <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/icon-1.svg') }}" alt="" />Milks and Dairies</a>
                            </li>
                            <li>
                                <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/icon-2.svg') }}" alt="" />Clothing & beauty</a>
                            </li>
                        </ul>
                        <ul class="end">
                            <li>
                                <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/icon-3.svg') }}" alt="" />Wines & Drinks</a>
                            </li>
                            <li>
                                <a href='shop-grid-right.html'> <img src="{{ asset('landing/assets/imgs/theme/icons/icon-4.svg') }}" alt="" />Fresh Seafood</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
            </div>
        </div> --}}
        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
            <nav>
                <ul>
                    {{-- <li class="hot-deals"><img src="{{ asset('landing/assets/imgs/theme/icons/icon-hot.svg') }}" alt="hot deals" /><a href='shop-grid-right.html'>Deals</a></li>
                    <li class="hot-deals"><img src="{{ asset('landing/assets/imgs/theme/icons/icon-hot.svg') }}" alt="hot deals" /><a href='shop-grid-right.html'>Deals</a></li> --}}
                    <li>
                        <a class='active' href='/'>Beranda</a>
                        {{-- <ul class="sub-menu">
                            <li><a href='index.html'>Home 1</a></li>
                            <li><a href='index-2.html'>Home 2</a></li>
                            <li><a href='index-3.html'>Home 3</a></li>
                            <li><a href='index-4.html'>Home 4</a></li>
                            <li><a href='index-5.html'>Home 5</a></li>
                            <li><a href='index-6.html'>Home 6</a></li>
                        </ul> --}}
                    </li>
                    {{-- <li>
                        <a href='page-about-2.html'>About</a>
                    </li>
                    <li>
                        <a href='shop-grid-right.html'>Shop <i class="fi-rs-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href='shop-grid-right.html'>Shop Grid – Right Sidebar</a></li>
                            <li><a href='shop-grid-left.html'>Shop Grid – Left Sidebar</a></li>
                            <li><a href='shop-list-right.html'>Shop List – Right Sidebar</a></li>
                            <li><a href='shop-list-left.html'>Shop List – Left Sidebar</a></li>
                            <li><a href='shop-fullwidth.html'>Shop - Wide</a></li>
                            <li>
                                <a href="#">Single Product <i class="fi-rs-angle-right"></i></a>
                                <ul class="level-menu">
                                    <li><a href='shop-product-right.html'>Product – Right Sidebar</a></li>
                                    <li><a href='shop-product-left.html'>Product – Left Sidebar</a></li>
                                    <li><a href='shop-product-full.html'>Product – No sidebar</a></li>
                                    <li><a href='shop-product-vendor.html'>Product – Vendor Info</a></li>
>>>>>>> 210352d00457f9497310f42c5a99e21f36f15ea5
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
