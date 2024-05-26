@extends('admin.layouts.main')

@section('title', 'Pengguna')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data pengguna</h4>
                    <p class="card-description">
                        Daftar Pengguna <code>table-striped</code>
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
                            {{-- <div class="align-right text-right mb-3">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal">Add</button>
                            </div> --}}
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Alamat</th>
                                    {{-- <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th> --}}
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggota as $data)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    <td>{{ $data->user->no_handphone }}</td>
                                    <td>{{ $data->user->alamat }}</td>
                                    {{-- <td>{{ $data->tempat_lahir }}</td>
                                    <td>{{ $data->tanggal_lahir }}</td> --}}
                                    {{-- <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $data->id }}">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $data->id }}">Delete</button>
                                    </td> --}}
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
            <form action="{{ url('/pengguna-add/') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama</label>
                        <input type="text" value="" name="nama" class="form-control" id="name" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="status"
                            class="col-form-label">Status</label>
                        <select name="status" class="form-control"
                            id="status" required>
                            <option selected disabled>Pilih Status</option>
                           <option value="Pria">Pria</option>
                           <option value="Wanita">Wanita</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="alamat" class="col-form-label">Email</label>
                        <input type="text" value="" name="emiail" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telpon" class="col-form-label">No Handphone</label>
                        <input type="text" value="" name="telpon" class="form-control" id="telpon" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir" class="col-form-label">Alamt</label>
                        <input type="text" value="" name="alamat" class="form-control" id="alamat" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                    </div> --}}
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn mb-2 btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
{{-- @section('script')
    <script>
        $(document).ready(function() {
            $('#dataTable-1').DataTable({
                autoWidth: true,
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [{
                        extend: 'colvis',
                        className: 'btn btn-primary btn-sm',
                        text: 'Column Visibility',
                    },
                    {
                        extend: 'pageLength',
                        className: 'btn btn-primary btn-sm',
                        text: 'Page Length',
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-primary btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-primary btn-sm',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    }
                ],
            });
        });
    </script>
@endsection --}}

@section('sweetalert')

@if (Session::get('update'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        icon: 'success'
        , title: 'Berhasil Diupdate'
        , showConfirmButton: false
        , timer: 1000
    , })

</script>
@endif
@if (Session::get('add'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        icon: 'success'
        , title: 'Berhasil Ditambahkan'
        , showConfirmButton: false
        , timer: 1000
    , })

</script>
@endif
@if (Session::get('delete'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        icon: 'success'
        , title: 'Berhasil Dihapus'
        , showConfirmButton: false
        , timer: 1000
    , })

</script>
@endif
@endsection
