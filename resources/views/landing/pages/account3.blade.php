@extends('landing.layouts.main')
@section('title', 'Account - ')
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href='index.html' rel='nofollow'><i class="fi-rs-home mr-5"></i>Beranda</a>
            {{-- <span></span> Pages <span></span> My Account --}}
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Peminjaman</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Akun Saya</a>
                                </li>
                                <li class="nav-item">
                                    <a class='nav-link' href='/user/logout'><i class="fi-rs-sign-out mr-10"></i>Keluar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Hello {{ Auth::user()->name }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                         Hallo Selamat Datang di &amp; Halam<a href="#">Akun Kamu</a>,<br />
                                           Senang <a href="#">Sekali</a> Bisa <a href="#">Bertemu Kamu Lagi Jangan Bosan Baca Buku Ya:)</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Your Order</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>Name</th> --}}
                                                        <th>Status</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th>Jumlah Hari Telat</th>
                                                        <th>Total Telat Denda</th>
                                                        <th>Detail Buku</th>
                                                        <th>Barcode</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pinjaman as $data )
                                                    <tr>
                                                        {{-- <td>{{ $data->name }}</td> --}}
                                                        <td>{{ $data->status }}</td>
                                                        <td>{{ $data->tanggal_pinjam }}</td>
                                                        <td>{{ $data->tanggal_kembali }}</td>
                                                        <td>
                                                            <?php
                                                            $tanggal_kembali = strtotime($data->tanggal_kembali);
                                                            $tanggal_sekarang = strtotime(date('Y-m-d'));
                                                            $telat = ($tanggal_sekarang - $tanggal_kembali) / (60 * 60 * 24);

                                                            if($data->status == 'Kembali' || $data->status == 'Pending' || $data->status == 'Gagal'){
                                                            echo '0';
                                                            // jika telat sama dengan 0 dan kurang dari 0 dan statusnya pinjam maka akan di tampilkan 0
                                                            } elseif ($telat < 0 && $data->status == 'Pinjam' ) {
                                                            echo '0';
                                                            }else{
                                                            echo $telat;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                if($data->status == 'Kembali' || $data->status == 'Pending' || $data->status == 'Gagal'){
                                                                    echo '0';
                                                                }
                                                                elseif ($telat < 0 && $data->status == 'Pinjam') {
                                                                    echo '0';
                                                                }
                                                                else {
                                                                    $jumlah_hari_telat = $telat;
                                                                    $jumlah_buku_yang_di_pinjam = \App\Models\DetailPinjaman::where('pinjaman_id', $data->id)->count();
                                                                    $denda = \App\Models\KategoriDenda::where('nama_kategori', 'Telat')->first()->harga_kategori;

                                                                     echo $jumlah_hari_telat * $jumlah_buku_yang_di_pinjam * $denda;

                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $detail_buku = \App\Models\DetailPinjaman::where('pinjaman_id', $data->id)->get();
                                                            $no = 1;
                                                            ?>
                                                            <ul>
                                                                @foreach ($detail_buku as $buku)
                                                                <li>{{ $no++ }}. {{ $buku->buku->judul_buku }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <div class="row justify-content-center">
                                                                @php
                                                                $enkripsi = Crypt::encryptString($data->id);
                                                                @endphp
                                                                {!! DNS2D::getBarcodeHTML($enkripsi, 'QRCODE', 3,3) !!}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($data->status == 'Pending')
                                                            <form action="/user/peminjaman/batal/{{ $data->id }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-sm btn-danger">Batalkan</button>
                                                            </form>
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Orders tracking</h3>
                                    </div>
                                    <div class="card-body contact-from-area">
                                        <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                    <div class="input-style mb-20">
                                                        <label>Order ID</label>
                                                        <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                    </div>
                                                    <div class="input-style mb-20">
                                                        <label>Billing email</label>
                                                        <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                    </div>
                                                    <button class="submit submit-auto-width" type="submit">Track</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card mb-3 mb-lg-0">
                                            <div class="card-header">
                                                <h3 class="mb-0">Billing Address</h3>
                                            </div>
                                            <div class="card-body">
                                                <address>
                                                    3522 Interstate<br />
                                                    75 Business Spur,<br />
                                                    Sault Ste. <br />Marie, MI 49783
                                                </address>
                                                <p>New York</p>
                                                <a href="#" class="btn-small">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Shipping Address</h5>
                                            </div>
                                            <div class="card-body">
                                                <address>
                                                    4299 Express Lane<br />
                                                    Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                                </address>
                                                <p>Sarasota</p>
                                                <a href="#" class="btn-small">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Akun Saya</h5>
                                    </div>
                                    <div class="card-body">
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
                                        <form action="/user/update-profil" method="post">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Nama <span class="required">*</span></label>
                                                    <input required="" value="{{ Auth::user()->name }}" class="form-control" name="name" type="text" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input required="" value="{{ Auth::user()->email }}" class="form-control" name="email" type="email" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>No Handphone <span class="required">*</span></label>
                                                    <input required="" value="{{ Auth::user()->no_handphone }}" class="form-control" name="no_handphone" type="text" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Alamat <span class="required">*</span></label>
                                                    <input required="" value="{{ Auth::user()->alamat }}" class="form-control" name="alamat" type="text" />
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>New Password <span class="required"></span></label>
                                                    <input class="form-control" name="password" type="password" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Confirm Password <span class="required"></span></label>
                                                    <input class="form-control" name="repassword" type="password" />
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                </div>
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
    </div>
</div>
@endsection
