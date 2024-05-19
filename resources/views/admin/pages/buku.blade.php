@extends('admin.layouts.main')

@section('title', 'Buku')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Buku</h4>
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
                            <div class="align-right text-right mb-3">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal">Add</button>
                            </div>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cover</th>
                                    <th>Judul Buku</th>
                                    <th>Isbn</th>
                                    <th>Tema</th>
                                    <th>Penerbit</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Jumlah Halaman</th>
                                    <th>Stok</th>
                                    <th>Sisa Stok</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($databuku as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('public/cover/' . $data->cover_buku) }}" alt="" srcset=""></td>
                                    <td>{{ $data->judul_buku }}</td>
                                    <td>{{ $data->isbn }}</td>
                                    <td>{{ $data->tema }}</td>
                                    <td>{{ $data->penerbit }}</td>
                                    <td>{{ $data->tgl_terbit }}</td>
                                    <td>{{ $data->jumlah_halaman }}</td>
                                    <td>{{ $data->stok }}</td>
                                    <td>
                                        @php
                                        $jumlah_buku_dipinjam = DB::table('pinjaman')
                                        ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
                                        ->where('detail_pinjaman.buku_id', $data->id)
                                        ->where('pinjaman.status', 'Pinjam')
                                        ->count();

                                        $sisa_stok = $data->stok - $jumlah_buku_dipinjam;
                                        echo $sisa_stok;
                                        @endphp
                                    </td>
                                    <td>{{ $data->kategori->nama_kategori }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $data->id }}">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $data->id }}">Delete</button>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="defaultModalLabel">Delete Table</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Ingin Menghapus Data {{ $data->nama }}?
                                            </div>
                                            <form action="/buku-delete/{{ $data->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-footer">
                                                    <button type="button" class="btn mb-2 btn-success" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn mb-2 btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

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
                                            <form action="{{ url('/buku-edit/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="isbn" class="col-form-label">ISBN</label>
                                                        <input type="text" value="{{ $data->isbn }}" name="isbn" class="form-control" id="isbn" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="judul_buku" class="col-form-label">Judul
                                                            Buku</label>
                                                        <input type="text" value="{{ $data->judul_buku }}" name="judul_buku" class="form-control" id="judul_buku" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cover_buku" class="col-form-label">Cover
                                                            Buku</label>
                                                        <input type="file" name="cover_buku" class="form-control-file" id="cover_buku">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="judul_buku" class="col-form-label">Jumlah Halaman</label>
                                                        <input type="text" value="{{ $data->jumlah_halaman }}" name="jumlah_halaman" class="form-control" id="judul_buku" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="judul_buku" class="col-form-label">Stok</label>
                                                        <input type="text" value="{{ $data->stok }}" name="stok" class="form-control" id="judul_buku" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                                        <textarea name="deskripsi" class="form-control" id="deskripsi" required>{{ $data->deskripsi }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tema" class="col-form-label">Tema</label>
                                                        <input type="text" value="{{ $data->tema }}" name="tema" class="form-control" id="tema" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="penerbit" class="col-form-label">Penerbit</label>
                                                        <input type="text" value="{{ $data->penerbit }}" name="penerbit" class="form-control" id="penerbit" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tgl_terbit" class="col-form-label">Tanggal
                                                            Terbit</label>
                                                        <input type="date" value="{{ $data->tgl_terbit }}" name="tgl_terbit" class="form-control" id="tgl_terbit" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="penerbit" class="col-form-label">Kategori</label>
                                                        <select name="kategori_id" class="form-control" id="kategori_id" required>
                                                            @foreach ($kategori as $kategoridata)
                                                            <option value="{{ $kategoridata->id }}" {{ $data->kategori_id == $kategoridata->id ? 'selected' : '' }}>{{ $kategoridata->nama_kategori }}</option>
                                                            @endforeach
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/buku-add/') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="isbn" class="col-form-label">ISBN</label>
                        <input type="text" value="" name="isbn" class="form-control" id="isbn" required>
                    </div>
                    <div class="form-group">
                        <label for="judul_buku" class="col-form-label">Judul Buku</label>
                        <input type="text" value="" name="judul_buku" class="form-control" id="judul_buku" required>
                    </div>
                    <div class="form-group">
                        <label for="cover_buku" class="col-form-label">Cover Buku</label>
                        <input type="file" name="cover_buku" class="form-control" id="cover_buku" required>
                    </div>
                    <div class="form-group">
                        <label for="judul_buku" class="col-form-label">Jumlah Halaman</label>
                        <input type="text" value="" name="jumlah_halaman" class="form-control" id="judul_buku" required>
                    </div>
                    <div class="form-group">
                        <label for="judul_buku" class="col-form-label">Stok</label>
                        <input type="text" value="" name="stok" class="form-control" id="judul_buku" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tema" class="col-form-label">Tema</label>
                        <input type="text" value="" name="tema" class="form-control" id="tema" required>
                    </div>
                    <div class="form-group">
                        <label for="penerbit" class="col-form-label">Penerbit</label>
                        <input type="text" value="" name="penerbit" class="form-control" id="penerbit" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_terbit" class="col-form-label">Tanggal Terbit</label>
                        <input type="date" name="tgl_terbit" class="form-control" id="tgl_terbit" required>
                    </div>
                    {{-- <div class="form-group">
                <label for="tgl_terbit" class="col-form-label">Kategori</label>
                <input type="date" value="{{ $data->nama_kategori }}" name="nama_kaegori" class="form-control" id="tgl_terbit" required>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="status" class="col-form-label">Status</label>
                    <select name="status" class="form-control" id="status" required>
                        <option value="Tersedia">Tersedia
                        </option>
                        <option value="Di pinjam">Di pinjam
                        </option>
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for="penerbit" class="col-form-label">Kategori</label>
                    <select name="kategori_id" class="form-control" id="kategori_id" required>
                        @foreach ($kategori as $kategoridata)
                        <option value="{{ $kategoridata->id }}">{{ $kategoridata->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn mb-2 btn-success">Save</button>
        </div>
        </form>
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
