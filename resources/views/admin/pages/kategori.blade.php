@extends('admin.layouts.main')

@section('title', 'Kategori')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kategori</h4>
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
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datakategori as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_kategori }}</td>
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
                                                Yakin Ingin Menghapus Data {{ $data->nama_kategori }}?
                                            </div>
                                            <form action="/kategori-delete/{{ $data->id }}" method="post">
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
                                            <form action="{{ url('/kategori-edit/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Nama Kategori</label>
                                                        <input type="text" value="{{ $data->nama_kategori }}" name="nama_kategori" class="form-control" id="nama_kategori">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn mb-2 btn-success">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
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
                                <form action="{{ url('/kategori-add/') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_kategori" class="col-form-label">Nama Kategori</label>
                                            <input type="text" value="" name="nama_kategori" class="form-control" id="nama_kategori" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn mb-2 btn-success">Save</button>
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
@endsection

@section('script')
@if(Session::get('store'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Ditambahkan'
        , showConfirmButton: false
        , timer: 1000
    , });

</script>
@endif
@if(Session::get('update'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Diubah'
        , showConfirmButton: false
        , timer: 1000
    , });

</script>
@endif
@if(Session::get('destroy'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Dihapus'
        , showConfirmButton: false
        , timer: 1000
    , });

</script>
@endif
@if(Session::get('error'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        icon: 'error'
        , title: 'Oops...'
        , text: 'Data Gagal Ditambahkan'
        , showConfirmButton: false
        , timer: 1000
    , });

</script>
@endif
@endsection

@section('script')
<script>
    $('#dataTable-1').DataTable({
        autoWidth: true
        , dom: 'Bfrtip'
        , lengthMenu: [
            [10, 25, 50, -1]
            , ['10 rows', '25 rows', '50 rows', 'Show all']
        ]
        , buttons: [{
                extend: 'colvis'
                , className: 'btn btn-primary btn-sm'
                , text: 'Column Visibility'
            , }
            , {
                extend: 'pageLength'
                , className: 'btn btn-primary btn-sm'
                , text: 'Page Length'
            , }
            , {
                extend: 'excel'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            }
            , {
                extend: 'pdf'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            }
            , {
                extend: 'print'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            }
        , ]
    , });

</script>
@endsection
