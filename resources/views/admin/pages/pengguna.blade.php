@extends('admin.layouts.main')

@section('title', 'Pengguna')

@section('content')
{{--
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
        <form action="{{ route('pengguna.create') }}" method="POST">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-nama" class="col-form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="recipient-nama">
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Status</label>
                    <select name="status" class="form-control" id="status" required>
                        <option value="Tersedia" >Pria</option>
                        <option value="Dipinjam" >Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="recipient-alamat" class="col-form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="recipient-alamat">
                </div>
                <div class="form-group">
                    <label for="recipient-telpon" class="col-form-label">No Handphone</label>
                    <input type="text" name="telpon" class="form-control" id="recipient-telpon">
                </div>
                <div class="form-group">
                    <label for="recipient-tempat_lahir" class="col-form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="recipient-tempat_lahir">
                </div>
                <div class="form-group">
                    <label for="recipient-tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                    <input type="text" name="tanggal_lahir" class="form-control" id="recipient-tanggal_lahir">
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
 --}}

<!DOCTYPE html>
<html>

        <head>
            <style>
                .action-icons {
            padding-left: 10px;
        }

        input[type="range"] {
        width: 100%;
    }

    input[type="range"]::-webkit-slider-runnable-track {
        width: 100%;
        height: 9px;
        cursor: pointer;
        background: #54b46f;
    }


    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 16px;
        height: 16px;
        background: #eeeeed;
        border-radius: 50%;
        cursor: pointer;
        margin-top: -8px;
    }


    .range-labels {
        display: flex;
        justify-content: space-between;
        padding: 0 10px;
        font-size: 13px;
    }

    .range-labels span {
        position: relative;
        width: 1px;
        text-align: center;
    }

    .range-labels span:before {
        content: "";
        position: absolute;
        width: 9px;
        height: 8px;
        background: #000000;
        border-radius: 100%;
        top: -8px;
        left: 80%;
        transform: translateX(-50%);
    }

        .edit-action  {
            background-color: blue;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .delete-action {
            background-color: red;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

          .line {
        margin: 1px 0;
        height: 2px;
        background: repeating-linear-gradient(
            to right,
            transparent,
            transparent 10px,
            black 10px,
            black 20px
        );
          }

        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }


        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .button-container button {
            padding: 10px 60px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .button-container button:first-child {
            background-color: #5b5d60;
            color: white;
        }

        .button-container button:last-child {
            background-color: #4CAF50;
            color: white;
        }

        .button-container button:hover {
            background-color: #007BFF;
            color: white;
        }

        .accordion-item {
            margin-bottom: 13px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .accordion-button.bg-success.text-dark,
        .accordion-button.bg-success.text-dark.collapsed,
        .accordion-button.bg-success.text-dark:not(.collapsed) {
            background-color: #d1f8ca !important;
        }
    </style>

</head>

<body>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseA" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                    INDENTITAS PASIEN
                </button>
            </h2>
            <div id="panelsStayOpen-collapseA" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="column" id="bColumn">

                        <div class="row align-items-start">
                            <div class="col mb-3">
                                <label for="namaPasien">Nama Pasien*</label>
                                <input type="text" class="form-control border-success" id="namaPasien" placeholder="Nama Pasien">
                            </div>
                            <div class="col mb-3">
                                <label for="noRekamMedik">No.Rekam Medik Pasien*</label>
                                <input type="text" class="form-control border-success" id="noRekamMedik" placeholder="123456">
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin1">Jenis Kelamin* </label>
                                <select class="form-select border-success" id="jenisKelamin1">
                                    <option value="lakiLaki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="tanggalLahir1">Tanggal Lahir*</label>
                                <input type="date" class="form-control border-success" id="tanggalLahir1" name="tanggalLahir1">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mb-3">
                                <label for="usiaPasien1">Usia Pasien*</label>
                                <input type="text" class="form-control border-success" id="usiaPasien1" placeholder="28th-6bln-22hr">
                            </div>
                            <div class="col mb-3">
                                <label for="usiaPasien2">Kelompok umur*</label>
                                <input type="text" class="form-control border-success" id="usiaPasien2" placeholder="dewasa">
                            </div>
                            <div class="col mb-3">
                                <label for="tanggalLahir2">Tanggal masuk RS*</label>
                                <input type="date" class="form-control border-success" id="tanggalLahir2" name="tanggalLahir2">
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin2">Penanggung biaya* </label>
                                <select class="form-select border-success" id="jenisKelamin2">
                                    <option value="lakiLaki">BPJS</option>
                                    <option value="perempuan">Mandiri</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin3">Jenis Assesment* </label>
                                <select class="form-select border-success" id="jenisKelamin3">
                                    <option value="lakiLaki">kandungan</option>
                                    <option value="perempuan">bidan</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <br>
                                <button type="button" style="width: 100%" class="btn btn-primary">DETAIL PESANAN</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseB" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                      RI.25- DAFTAR TINDAK LANJUT PASIEN PULANG
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseB" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="column" id="bColumn">

                            <p class="fs-5"><strong>AKTIVITAS</strong></p>

                            <div class="row align-items-start">
                                <div class="col mb-3">
                                  <label for="">Jenis Aktivatis yang boleh dilakukan*</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                                <div class="col mb-3">
                                  <label for="">Prosedur*</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                                <div class="col mb-3">
                                  <label for="">Alat Bnatu yang Digunakan*</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                            </div>

                        </div>

                        <p class="fs-5"><strong>EDUKASI PASIEN DAN KLUARGA</strong></p>

                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <label for="">Pemeriksaan Laboratarium Lanjutan*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Pengertian Dan Pemahaman Efek Samping Obat*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Obat-Obatan Alternatif*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                        </div>
                        <p class="fs-5"><strong></strong></p>
                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <label for="">Pencegahan Terhadap Kekambuhan*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Lainya*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">

                            </div>
                        </div>

                        <p class="fs-5"><strong>PERAWATAN DIRUMAH</strong></p>

                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <label for="">Pengobatan yang dapat dilakukan di rumah sebelum ke rumah sakit*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Kenali tindak gejela yang di laporkan*<br>.</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Kontak yang dapat dihubungi bila terdapat gejala yang perlu dilaporkan* </label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                        </div>

                        <p class="fs-5"><strong>DIET</strong></p>

                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <label for="">Anjuran Pola Makanan*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Batasan Makanan*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">

                            </div>
                        </div>
                        <p class="fs-5"><strong>FASILITAS LAYANAN KESEHATAN PRIMER/MANDIRI SESUAI DOMISILI PASIEN </strong></p>

                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                        </div>


                        <p class="fs-5"><strong> DAFTAR OBAT</strong></p>

                        <div>
                            <button class="btn btn-success">+ Tambah</button>
                            <span>Show</span>
                            <div class="btn-group">
                                <button type="button" class="btn border dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    10
                                </button>
                            </div>
                            <span>Entries</span>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">25</a>
                                    <a class="dropdown-item" href="#">50</a>
                                    <a class="dropdown-item" href="#">100</a>
                                </div>

                                <p class="fs-5"><strong> </strong></p>

                    <table class="table text-center">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Obat</th>
                                            <th scope="col">indikasi</th>
                                            <th scope="col">Dosis</th>
                                            <th scope="col">Cara Minum</th>
                                            <th scope="col">Waktu Minum</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">1</th>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td>
                                                <head>
                                                    <meta charset="UTF-8">
                                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                    <title>Modal Example</title>
                                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
                                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
                                                </head>
                                                <body>

                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-auto">
                                                            <span class="edit-action" onclick="editRow(this)" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <span class="delete-action" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">From DPJP</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="searchInput">Pilih Obat*:</label>
                                                                            <input type="text" class="form-control" id="searchInput">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="formInput1">Indikasi*:</label>
                                                                            <input type="text" class="form-control" id="formInput1">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="formInput2">Dosis</label>
                                                                            <input type="text" class="form-control" id="formInput2">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="formInput3">Waktu Minum*</label>
                                                                            <input type="text" class="form-control" id="formInput3">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="formInput4">Cara Minum*</label>
                                                                            <input type="text" class="form-control" id="formInput4">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-between">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="button" class="btn btn-primary" onclick="saveEdit()">Tambahkan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                    </div>

                        <p class="fs-5"><strong> JADWAL KONTROL</strong></p>

                        <div>
                            <button class="btn btn-success">+ Tambah</button>
                            <span>Show</span>
                            <div class="btn-group">
                                <button type="button" class="btn border dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    10
                                </button>
                            </div>
                            <span>Entries</span>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">25</a>
                                    <a class="dropdown-item" href="#">50</a>
                                    <a class="dropdown-item" href="#">100</a>
                                </div>
                        </div>

                                <p class="fs-5"><strong> </strong></p>
<Div>

    <table class="table text-center">

                                    <thead class="bg-secondary">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Perjanjian Atau pemeriksaan</th>
                                            <th scope="col">Tempat Kontrol</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">No.Tlpn</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">1</th>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td>
                                                <head>
                                                    <meta charset="UTF-8">
                                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                    <title>Modal Example</title>
                                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
                                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
                                                </head>
                                                <body>

                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-auto">
                                                            <span class="edit-action" onclick="editRow(this)" data-toggle="modal" data-target="#editModalJadwal"><i class="fas fa-edit"></i></span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <span class="delete-action" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal" id="editModalJadwal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalJadwalLabel">FROM DPJP</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="customEditForm">
                                                                    <div class="form-group">
                                                                        <label for="input1">Perjanjuan atau Pemeriksaan</label>
                                                                        <input type="text" class="form-control" id="input1" placeholder="Enter value for Input 1">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="input2">Tempat Kontrol</label>
                                                                        <input type="text" class="form-control" id="input2" placeholder="Enter value for Input 2">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="tanggalLahir1">Tanggal Lahir*</label>
                                                                            <input type="date" class="form-control border-success" id="tanggalLahir1" name="tanggalLahir1">
                                                                        </div>

                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="input2">Nomor Telepon*</label>
                                                                            <input type="text" class="form-control" id="input2" placeholder="Enter value for Input 2">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-between">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="button" class="btn btn-primary" onclick="saveEdit()">Tambahkan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="p-2 text-black rounded" style="background-color: #FAFF00;"><i class='bx bx-error'
                                    style="font-size: 20px; margin-left: 5px">
                                    <label style="font-size: 15px; font-weight: bold;">Intruksi:RENCANA PEMULANGAN PASIEN ini telahdijelaskan kepada pasien dan/ kluarga</label></i>
                                </div>

                        <div class="row align-items-center">
                            <div class="col mb-3">
                                <label for="jenisKelamin2">TTD.DPJP</label>
                                <select class="form-select border-success" id="jenisKelamin2">
                                    <option value="lakiLaki">BPJS</option>
                                    <option value="perempuan">Mandiri</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin3">TTD KEPRAWATAN</label>
                                <select class="form-select border-success" id="jenisKelamin3">
                                    <option value="lakiLaki">kandungan</option>
                                    <option value="perempuan">bidan</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin3">TTD FARMASI </label>
                                <select class="form-select border-success" id="jenisKelamin3">
                                    <option value="lakiLaki">kandungan</option>
                                    <option value="perempuan">bidan</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="namaPasien">Nama Pasien*</label>
                                <input type="text" class="form-control border-success" id="namaPasien" placeholder="Nama Pasien">
                            </div>
                            <div class="col mb-3">
                                <br>
                                <button type="button" style="width: 100%" class="btn btn-primary">DETAIL PESANAN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Div>

         <!DOCTYPE html>
<html>

        <head>
            <style>
                .action-icons {
            padding-left: 10px;
        }

        input[type="range"] {
        width: 100%;
    }

    input[type="range"]::-webkit-slider-runnable-track {
        width: 100%;
        height: 9px;
        cursor: pointer;
        background: #54b46f;
    }


    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 16px;
        height: 16px;
        background: #eeeeed;
        border-radius: 50%;
        cursor: pointer;
        margin-top: -8px;
    }


    .range-labels {
        display: flex;
        justify-content: space-between;
        padding: 0 10px;
        font-size: 13px;
    }

    .range-labels span {
        position: relative;
        width: 1px;
        text-align: center;
    }

    .range-labels span:before {
        content: "";
        position: absolute;
        width: 9px;
        height: 8px;
        background: #000000;
        border-radius: 100%;
        top: -8px;
        left: 80%;
        transform: translateX(-50%);
    }

        .edit-action  {
            background-color: blue;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .delete-action {
            background-color: red;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

          .line {
        margin: 1px 0;
        height: 2px;
        background: repeating-linear-gradient(
            to right,
            transparent,
            transparent 10px,
            black 10px,
            black 20px
        );
          }

        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }


        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .button-container button {
            padding: 10px 60px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .button-container button:first-child {
            background-color: #5b5d60;
            color: white;
        }

        .button-container button:last-child {
            background-color: #4CAF50;
            color: white;
        }

        .button-container button:hover {
            background-color: #007BFF;
            color: white;
        }

        .accordion-item {
            margin-bottom: 13px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .accordion-button.bg-success.text-dark,
        .accordion-button.bg-success.text-dark.collapsed,
        .accordion-button.bg-success.text-dark:not(.collapsed) {
            background-color: #d1f8ca !important;
        }
    </style>

</head>

<body>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseA" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                    INDENTITAS PASIEN
                </button>
            </h2>
            <div id="panelsStayOpen-collapseA" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="column" id="bColumn">

                        <div class="row align-items-start">
                            <div class="col mb-3">
                                <label for="namaPasien">Nama Pasien*</label>
                                <input type="text" class="form-control border-success" id="namaPasien" placeholder="Nama Pasien">
                            </div>
                            <div class="col mb-3">
                                <label for="noRekamMedik">No.Rekam Medik Pasien*</label>
                                <input type="text" class="form-control border-success" id="noRekamMedik" placeholder="123456">
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin1">Jenis Kelamin* </label>
                                <select class="form-select border-success" id="jenisKelamin1">
                                    <option value="lakiLaki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="tanggalLahir1">Tanggal Lahir*</label>
                                <input type="date" class="form-control border-success" id="tanggalLahir1" name="tanggalLahir1">
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col mb-3">
                                <label for="usiaPasien1">Usia Pasien*</label>
                                <input type="text" class="form-control border-success" id="usiaPasien1" placeholder="28th-6bln-22hr">
                            </div>
                            <div class="col mb-3">
                                <label for="usiaPasien2">Kelompok umur*</label>
                                <input type="text" class="form-control border-success" id="usiaPasien2" placeholder="dewasa">
                            </div>
                            <div class="col mb-3">
                                <label for="tanggalLahir2">Tanggal masuk RS*</label>
                                <input type="date" class="form-control border-success" id="tanggalLahir2" name="tanggalLahir2">
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin2">Penanggung biaya* </label>
                                <select class="form-select border-success" id="jenisKelamin2">
                                    <option value="lakiLaki">BPJS</option>
                                    <option value="perempuan">Mandiri</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin3">Jenis Assesment* </label>
                                <select class="form-select border-success" id="jenisKelamin3">
                                    <option value="lakiLaki">kandungan</option>
                                    <option value="perempuan">bidan</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <br>
                                <button type="button" style="width: 100%" class="btn btn-primary">DETAIL PESANAN</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseB" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                      RI.25- DAFTAR TINDAK LANJUT PASIEN PULANG
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseB" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="column" id="bColumn">

                            <p class="fs-5"><strong>AKTIVITAS</strong></p>

                            <div class="row align-items-start">
                                <div class="col mb-3">
                                  <label for="">Jenis Aktivatis yang boleh dilakukan*</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                                <div class="col mb-3">
                                  <label for="">Prosedur*</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                                <div class="col mb-3">
                                  <label for="">Alat Bnatu yang Digunakan*</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                            </div>

                        </div>

                        <p class="fs-5"><strong>EDUKASI PASIEN DAN KLUARGA</strong></p>

                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <label for="">Pemeriksaan Laboratarium Lanjutan*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Pengertian Dan Pemahaman Efek Samping Obat*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Obat-Obatan Alternatif*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                        </div>
                        <p class="fs-5"><strong></strong></p>
                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <label for="">Pencegahan Terhadap Kekambuhan*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Lainya*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">

                            </div>
                        </div>

                        <p class="fs-5"><strong>PERAWATAN DIRUMAH</strong></p>

                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <label for="">Pengobatan yang dapat dilakukan di rumah sebelum ke rumah sakit*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Kenali tindak gejela yang di laporkan*<br>.</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Kontak yang dapat dihubungi bila terdapat gejala yang perlu dilaporkan* </label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                        </div>

                        <p class="fs-5"><strong>DIET</strong></p>

                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <label for="">Anjuran Pola Makanan*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">
                              <label for="">Batasan Makanan*</label>
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                            <div class="col mb-3">

                            </div>
                        </div>
                        <p class="fs-5"><strong>FASILITAS LAYANAN KESEHATAN PRIMER/MANDIRI SESUAI DOMISILI PASIEN </strong></p>

                        <div class="row align-items-start">
                            <div class="col mb-3">
                              <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                            </div>
                        </div>


                        <p class="fs-5"><strong> DAFTAR OBAT</strong></p>

                        <div>
                            <button class="btn btn-success">+ Tambah</button>
                            <span>Show</span>
                            <div class="btn-group">
                                <button type="button" class="btn border dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    10
                                </button>
                            </div>
                            <span>Entries</span>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">25</a>
                                    <a class="dropdown-item" href="#">50</a>
                                    <a class="dropdown-item" href="#">100</a>
                                </div>

                                <p class="fs-5"><strong> </strong></p>

                    <table class="table text-center">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Obat</th>
                                            <th scope="col">indikasi</th>
                                            <th scope="col">Dosis</th>
                                            <th scope="col">Cara Minum</th>
                                            <th scope="col">Waktu Minum</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">1</th>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td>
                                                <head>
                                                    <meta charset="UTF-8">
                                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                    <title>Modal Example</title>
                                                </head>
                                                <body>

                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-auto">
                                                            <span class="edit-action" onclick="editRow(this)" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <span class="delete-action" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">From DPJP</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-md-12 mb-3">
                                                                            <label for="searchInput">Pilih Obat*:</label>
                                                                            <input type="text" class="form-control" id="searchInput">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="formInput1">Indikasi*:</label>
                                                                            <input type="text" class="form-control" id="formInput1">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="formInput2">Dosis</label>
                                                                            <input type="text" class="form-control" id="formInput2">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="formInput3">Waktu Minum*</label>
                                                                            <input type="text" class="form-control" id="formInput3">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="formInput4">Cara Minum*</label>
                                                                            <input type="text" class="form-control" id="formInput4">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-between">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="button" class="btn btn-primary" onclick="saveEdit()">Tambahkan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                    </div>

                        <p class="fs-5"><strong> JADWAL KONTROL</strong></p>

                        <div>
                            <button class="btn btn-success">+ Tambah</button>
                            <span>Show</span>
                            <div class="btn-group">
                                <button type="button" class="btn border dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    10
                                </button>
                            </div>
                            <span>Entries</span>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">25</a>
                                    <a class="dropdown-item" href="#">50</a>
                                    <a class="dropdown-item" href="#">100</a>
                                </div>
                        </div>

                                <p class="fs-5"><strong> </strong></p>
<Div>

    <table class="table text-center">

                                    <thead class="bg-secondary">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Perjanjian Atau pemeriksaan</th>
                                            <th scope="col">Tempat Kontrol</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">No.Tlpn</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">1</th>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td class="text-center">empty</td>
                                            <td>
                                                <head>
                                                    <meta charset="UTF-8">
                                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                    <title>Modal Example</title>
                                                </head>
                                                <body>

                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-auto">
                                                            <span class="edit-action" onclick="editRow(this)" data-toggle="modal" data-target="#editModalJadwal"><i class="fas fa-edit"></i></span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <span class="delete-action" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal" id="editModalJadwal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalJadwalLabel">FROM DPJP</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="customEditForm">
                                                                    <div class="form-group">
                                                                        <label for="input1">Perjanjuan atau Pemeriksaan</label>
                                                                        <input type="text" class="form-control" id="input1" placeholder="Enter value for Input 1">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="input2">Tempat Kontrol</label>
                                                                        <input type="text" class="form-control" id="input2" placeholder="Enter value for Input 2">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="tanggalLahir1">Tanggal Lahir*</label>
                                                                            <input type="date" class="form-control border-success" id="tanggalLahir1" name="tanggalLahir1">
                                                                        </div>

                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="input2">Nomor Telepon*</label>
                                                                            <input type="text" class="form-control" id="input2" placeholder="Enter value for Input 2">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-between">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="button" class="btn btn-primary" onclick="saveEdit()">Tambahkan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="p-2 text-black rounded" style="background-color: #FAFF00;"><i class='bx bx-error'
                                    style="font-size: 20px; margin-left: 5px">
                                    <label style="font-size: 15px; font-weight: bold;">Intruksi:RENCANA PEMULANGAN PASIEN ini telahdijelaskan kepada pasien dan/ kluarga</label></i>
                                </div>

                        <div class="row align-items-center">
                            <div class="col mb-3">
                                <label for="jenisKelamin2">TTD.DPJP</label>
                                <select class="form-select border-success" id="jenisKelamin2">
                                    <option value="lakiLaki">BPJS</option>
                                    <option value="perempuan">Mandiri</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin3">TTD KEPRAWATAN</label>
                                <select class="form-select border-success" id="jenisKelamin3">
                                    <option value="lakiLaki">kandungan</option>
                                    <option value="perempuan">bidan</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="jenisKelamin3">TTD FARMASI </label>
                                <select class="form-select border-success" id="jenisKelamin3">
                                    <option value="lakiLaki">kandungan</option>
                                    <option value="perempuan">bidan</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="namaPasien">Nama Pasien*</label>
                                <input type="text" class="form-control border-success" id="namaPasien" placeholder="Nama Pasien">
                            </div>
                            <div class="col mb-3">
                                <br>
                                <button type="button" style="width: 100%" class="btn btn-primary">DETAIL PESANAN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
        {{-- </body> --}}

        </html>



@endsection

