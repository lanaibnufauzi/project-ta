@extends('admin.layouts.main')

@section('title', 'Buku')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Peminjaman</h4>
                    <div class="text-center-reader">
                        <div class="row">
                            <h3>Scan QR Code</h3>
                        </div>
                        <div class="row">
                            <div id="reader"></div>
                        </div>
                    </div>
                    <p class="card-description">
                        Add class <code>.table-striped</code>
                    </p>
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
                    <div class="table-responsive">
                        <table id="dataTable-1" class="table table-striped responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Jumlah Hari Telat</th>
                                    <th>Total Telat Denda</th>
                                    <th>Status</th>
                                    <th>Detail Buku</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pinjaman as $data )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->tgl_pinjam }}</td>
                                    <td>{{ $data->tgl_kembali }}</td>
                                    <td>
                                        <?php
                                        $tanggal_kembali = strtotime($data->tgl_kembali);
                                        $tanggal_sekarang = strtotime(date('Y-m-d'));
                                        $telat = ($tanggal_sekarang - $tanggal_kembali) / (60 * 60 * 24);

                                        if($data->status == 'Kembali' || $data->status == 'Pending' || $data->status == 'Gagal'){
                                        echo '0';
                                        // jika telat sama dengan 0 dan kurang dari 0 dan statusnya pinjam maka akan di tampilkan 0
                                        } elseif ($telat < 0 && $data->status == 'Pinjam') {
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
                                        @php
                                        $jumlah_buku = DB::table('detail_pinjaman')->where('pinjaman_id', $data->id)->count();
                                        @endphp

                                        @if ($data->status == 'Kembali')
                                        <span class="badge badge-success">{{ $data->status }}</span>
                                        @elseif ($data->status == 'Pinjam')
                                        <span class="badge badge-warning">{{ $data->status }}</span>
                                        @else
                                        <span class="badge badge-danger">{{ $data->status }}</span>
                                        @endif

                                    </td>

                                    <td>
                                        @php
                                        $detail_buku = \App\Models\DetailPinjaman::where('pinjaman_id', $data->id)->get();
                                        $no = 1;
                                        @endphp
                                        <ul>
                                            @foreach ($detail_buku as $buku)
                                            <li>{{ $no++ }}. {{ $buku->buku->judul_buku }}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td>

                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $data->id }}">Edit</button>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="defaultModalLabel">Edit Table</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/peminjaman/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="penerbit" class="col-form-label">Status</label>
                                                        <select name="status" class="form-control" id="status" required>
                                                            <option disabled selected>Pilih Status</option>
                                                            <option value="Pinjam">Dipinjam</option>
                                                            <option value="Kembali">Dikembalikan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn mb-2 btn-success">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script>
    function onScanSuccess(decodedText, decodedResult) {

        $('#reader').val(decodedText);
        let id = decodedText;
        html5QrcodeScanner.clear();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/peminjaman/kembalikan"
            , type: "POST"
            , data: {
                _token: csrf_token
                , peminjaman_id: id
            , }
            , success: function(response) {
                console.log(response);
                if (response.success == "berhasil") {
                    Swal.fire({
                        title: 'Berhasil'
                        , text: "Pengembalian Buku Berhasil"
                        , icon: 'success'
                        , confirmButtonColor: '#3085d6'
                        , confirmButtonText: 'OK'
                    }).then((result) => {
                        location.reload();

                    })
                } else {
                    Swal.fire({
                        title: 'Gagal'
                        , text: "Pengembalian Buku Gagal"
                        , icon: 'error'
                        , confirmButtonColor: '#3085d6'
                        , confirmButtonText: 'OK'
                    }).then((result) => {
                        location.reload();

                    })
                }
            }
        , });

    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10
            , qrbox: 250
        });
    html5QrcodeScanner.render(onScanSuccess);

</script>

<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        // "lengthMenu": [
        //     [16, 32, 64, -1],
        //     [16, 32, 64, "All"]
        // ]
        dom: 'Bfrtip',


        lengthMenu: [
            [10, 25, 50, -1]
            , ['10 rows', '25 rows', '50 rows', 'Show all']
        ],

        buttons: [{
                extend: 'colvis'
                , className: 'btn btn-primary btn-sm'
                , text: 'Column Visibility',
                // columns: ':gt(0)'


            },

            {

                extend: 'pageLength'
                , className: 'btn btn-primary btn-sm'
                , text: 'Page Length',
                // columns: ':gt(0)'
            },


            // 'colvis', 'pageLength',

            {
                extend: 'excel'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            // {
            //     extend: 'csv',
            //     className: 'btn btn-primary btn-sm',
            //     exportOptions: {
            //         columns: [0, ':visible']
            //     }
            // },
            {
                extend: 'pdf'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            {
                extend: 'print'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            // 'pageLength', 'colvis',
            // 'copy', 'csv', 'excel', 'print'

        ]
    , });

</script>

@if(Session::get('store'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Ditambahkan'
    , });

</script>
@endif
@if(Session::get('update'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Diubah'
    , });

</script>
@endif
@if(Session::get('destroy'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Dihapus'
    , });

</script>
@endif
@if(Session::get('error'))
<script>
    Swal.fire({
        icon: 'error'
        , title: 'Oops..'
        , text: 'Oops..'
    , });

</script>
@endif
@endsection
