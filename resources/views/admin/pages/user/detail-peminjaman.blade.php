@extends('admin.layouts.main')

@section('title', 'Pinjam')

@section('content')
<div class="content-wrapper">
    @if(Auth::user()->id_role == 1)


    @else
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pinjam</h4>



                    <div class="mt-4 ">
                        <form action="/user/peminjaman/storebuku" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="judul_buku" class="col-form-label">Data Buku</label>
                                <select name="buku_id" id="buku_id" class="form-control">
                                    <option value="">Pilih Buku</option>
                                    @foreach($buku as $b)
                                    <option value="{{$b->id}}">{{$b->judul_buku}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="pinjaman_id" value="{{ $pinjaman_id }}">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pinjam</h4>
                    <div class="table-responsive">
                        <table id="dataTable-1" class="table table-striped responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Isbn</th>
                                    <th>Tema</th>
                                    <th>Penerbit</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail_pinjaman as $data )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->buku->judul_buku }}</td>
                                    <td>{{ $data->buku->isbn }}</td>
                                    <td>{{ $data->buku->tema }}</td>
                                    <td>{{ $data->buku->penerbit }}</td>
                                    <td>{{ $data->buku->tgl_terbit }}</td>
                                    <td>{{ $data->buku->kategori->nama_kategori }}</td>
                                    <td>

                                        @php
                                        $pinjaman = \App\Models\Pinjaman::find($pinjaman_id);
                                        @endphp


                                        @if($pinjaman->status == 'Dipinjam' || $pinjaman->status == 'Dikembalikan')
                                        -
                                        @else
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $data->id }}">Delete</button>
                                        @endif
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
                                                Yakin Ingin Menghapus Data {{ $data->buku->judul_buku }}?
                                            </div>
                                            <form action="/user/peminjaman/delete/{{ $data->id }}" method="post">
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
