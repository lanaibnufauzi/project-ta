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
                        <div class="table-responsive">
                            <table id="dataTable-1" class="table table-striped responsive nowrap" style="width:100%">
                                <div class="align-right text-right mb-3">
                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#addModal">Add</button>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Telephone</th>
                                        <th>Alamat</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataanggota as $data)
                                        <tr>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->telpon }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->tempat_lahir }}</td>
                                            <td>{{ $data->tanggal_lahir }}</td>
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
                                                    <form action="/pengguna-delete/{{ $data->id }}" method="post">
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
                                                    <form action="/pengguna-edit/{{ $data->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="recipient-nama" class="col-form-label">nama</label>
                                                                <input type="text" value="{{ $data->nama }}" name="name" class="form-control" id="recipient-nama">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="status" class="col-form-label">Status</label>
                                                                <select name="status" class="form-control" id="status" required>
                                                                    <option value="Tersedia" {{ $data->status == 'Pria' ? 'selected' : '' }}>Pria</option>
                                                                    <option value="Dipinjam" {{ $data->status == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-telepon" class="col-form-label">No_handpone</label>
                                                                <input type="text" value="{{ $data->telpon }}" name="no_handpone" class="form-control" id="recipient-telepon">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-alamat" class="col-form-label">Alamat</label>
                                                                <input type="text" value="{{ $data->alamat }}" name="email" class="form-control" id="recipient-alamt">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-tempat_lahir" class="col-form-label">Tempat Lahir</label>
                                                                <input type="text" value="{{ $data->tempat_lahir }}" name="tempat_lahir" class="form-control" id="recipient-tempat_lahir">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-tanggal_lahir" class="col-form-label">tamggal_lahir</label>
                                                                <input type="text" value="{{ $data->tanggal_lahir }}" name="email" class="form-control" id="recipient-tanggal_lahir">
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
            <div class="form-group">
                <label for="nama" class="col-form-label">Nama</label>
                <input type="text" value="{{ $data->nama}}"
                    name="nama" class="form-control" id="nama"required>
            </div>
                <div class="form-group">
                    <label for="status"
                        class="col-form-label">Status</label>
                    <select name="status" class="form-control"
                        id="status" required>
                        <option value="Tersedia"
                            {{ $data->status == 'Tersedia' ? 'selected' : '' }}>
                            Pria</option>
                        <option value="Di Pinjam"
                            {{ $data->status == 'Dipinjam' ? 'selected' : '' }}>
                            Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat" class="col-form-label">Alamat</label>
                    <input type="text" value="{{ $data->alamat}}"
                        name="alamat" class="form-control" id="alamat"required>
                </div>
                <<div class="form-group">
                    <label for="telpon" class="col-form-label">No Handphone</label>
                    <input type="text" value="{{ $data->telpon}}"
                        name="telpon" class="form-control" id="telpon"required>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
                    <input type="text" value="{{ $data->tempat_lahir}}"
                        name="tempat_lahir" class="form-control" id="tempat_lahir"required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                    <input type="text" value="{{ $data->tanggal_lahir}}"
                        name="tanggal_lahir" class="form-control" id="tanggal_lahir"required>
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
@endsection

@section('sweetalert')

@if (Session::get('update'))
<script>
  Swal.fire({
  icon: 'success',
  title: 'Berhasil Diupdate',
})
</script>
@endif
@if (Session::get('add'))
<script>
   Swal.fire({
  icon: 'success',
  title: 'Berhasil Ditambah',
})
</script>
@endif
@if (Session::get('delete'))
<script>
  Swal.fire({
  icon: 'success',
  title: 'Berhasil Dihapus',
})
</script>
@endif
@endsection

