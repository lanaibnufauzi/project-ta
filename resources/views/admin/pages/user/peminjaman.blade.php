@extends('admin.layouts.main')

@section('title', 'Pinjam')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pinjam</h4>
                    <div class="table-responsive">
                        <table id="dataTable-1" class="table table-striped responsive nowrap" style="width:100%">
                            <div class="align-right text-right mb-3">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal">Add</button>
                            </div>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pinjaman as $data )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>
                                        @php
                                        $jumlah_buku = DB::table('detail_pinjaman')->where('pinjaman_id', $data->id)->count();
                                        @endphp

                                        @if ($data->status == 'Dikembalikan')
                                        <span class="badge badge-success">{{ $data->status }}</span>
                                        @elseif ($data->status == 'Dipinjam')
                                        <span class="badge badge-warning">{{ $data->status }}</span>
                                        @else
                                        @if ($jumlah_buku == 0)
                                        <span class="badge badge-danger">Belum Meminjam Buku</span>
                                        @else
                                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                        @endif
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/user/peminjaman/detail/{{ $data->id }}" class="btn btn-primary btn-sm">Isi Buku</a>
                                    </td>
                                </tr>
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
                                <form action="/user/peminjaman/store" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <p>Tambah Data Pinjaman ?</p>
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

    @endsection

    @section('script')
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
    @endsection
