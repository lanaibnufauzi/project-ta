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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
