@extends('admin.layouts.main')

@section('title', 'Report')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Report</h4>
                    <div class="mb-2">
                        <form action="/report" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="tgl_pinjam">Tanggal</label>
                                <input type="date" class="form-control" id="tgl_pinjam" name="date1">
                            </div>
                            <div class="form-group">
                                <label for="tgl_kembali">Tanggal</label>
                                <input type="date" class="form-control" id="tgl_kembali" name="date2">
                            </div>
                            <div class="form-group">
                                <label for="tgl_pinjam">Status</label>
                                <select class="form-control" name="status">
                                    <option selected value="0">Pilih Status</option>
                                    <option value="Pinjam">Pinjam</option>
                                    <option value="Kembali">Kembali</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pinjaman as $data )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @php
                                        $iv = '1234567890123456';
                                        $key = '1234567890123456';
                                        $name = openssl_decrypt($data->name, 'AES-128-CBC', $key, 0, $iv);
                                        @endphp
                                        {{ $name }}
                                    </td>
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

                                        $buku_rusak = \App\Models\DetailPinjaman::where('pinjaman_id', $data->id)->where('kondisi_buku', 'Rusak')->count();
                                        $buku_hilang = \App\Models\DetailPinjaman::where('pinjaman_id', $data->id)->where('kondisi_buku', 'Hilang')->count();

                                        $denda_rusak = \App\Models\KategoriDenda::where('nama_kategori', 'Rusak')->first()->harga_kategori;
                                        $denda_hilang = \App\Models\KategoriDenda::where('nama_kategori', 'Hilang')->first()->harga_kategori;

                                        $total_denda_rusak = $buku_rusak * $denda_rusak;
                                        $total_denda_hilang = $buku_hilang * $denda_hilang;

                                        $total_denda = $total_denda_rusak + $total_denda_hilang;

                                        @endphp
                                        <ul>
                                            @foreach ($detail_buku as $buku)
                                            <li>{{ $no++ }}. {{ $buku->buku->judul_buku }} <br> Kondisi Buku : {{ $buku->kondisi_buku }}</li>
                                            @endforeach

                                            <div class="mt-2">
                                                <h5> Total Denda Kondisi : Rp. {{ number_format($total_denda, 0, ',', '.') }}</h5>
                                            </div>
                                        </ul>
                                    </td>
                                </tr>
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
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        title: 'Good'
        , text: 'Data Berhasil Ditambahkan'
        , icon: 'success'
        , timer: 1000
        , showConfirmButton: false
    , });

</script>
@endif
@if(Session::get('update'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        title: 'Good'
        , text: 'Data Berhasil Diubah'
        , icon: 'success'
        , timer: 1000
        , showConfirmButton: false
    , });

</script>
@endif
@if(Session::get('destroy'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        title: 'Good'
        , text: 'Data Berhasil Dihapus'
        , icon: 'success'
        , timer: 1000
        , showConfirmButton: false
    , });

</script>
@endif
@if(Session::get('error'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        title: 'Gagal'
        , text: 'Data Gagal Ditambahkan'
        , icon: 'error'
        , timer: 1000
        , showConfirmButton: false
    , });

</script>
@endif
@if(Session::get('kondisibuku'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        title: 'Good'
        , text: 'Kondisi Buku Berhasil Diubah'
        , icon: 'success'
        , timer: 1000
        , showConfirmButton: false
    , });

</script>
@endif
@if(Session::get('ubahstatus'))
<script>
    Swal.fire({
        // tidak usah tombol oke, berikan waktu 1 detik
        title: 'Good'
        , text: 'Status Berhasil Diubah'
        , icon: 'success'
        , timer: 1000
        , showConfirmButton: false
    , });

</script>
@endif
@endsection
