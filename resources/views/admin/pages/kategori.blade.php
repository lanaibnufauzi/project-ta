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
                        <div class="table-responsive">
                            <table id="dataTable-1" class="table table-striped responsive nowrap" style="width:100%">
                                <div class="align-right text-right mb-3">
                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#addModal">Add</button>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datakategori as $data)
                                    <tr>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#editModal{{ $data->id }}">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#deleteModal{{ $data->id }}">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="defaultModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="defaultModalLabel">Delete Table</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                        <button type="button" class="btn mb-2 btn-success"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn mb-2 btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="defaultModalLabel">Edit Table</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                 <form action="{{ url('/kategori-edit/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Nama Kategori</label>
                                                            <input type="text" value="{{ $data->nama_kategori }}" name="nama_kategori"
                                                                class="form-control" id="nama_kategori">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mb-2 btn-danger"
                                                            data-dismiss="modal">Close</button>
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
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
                        aria-hidden="true">
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
                                            <input type="text" value="{{ $data->nama_kategori }}" name="nama_kategori" class="form-control"
                                                id="nama_kategori" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn mb-2 btn-danger"
                                                data-dismiss="modal">Close</button>
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
    <script>
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
                },
            ],
        });
    </script>

{{--
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
                        A.PENGKAJIAN PERWAT/BIDAN
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseA" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="column" id="bColumn">

                            <div class="row align-items-start">
                                <div class="col mb-3">
                                    <label for="tibaDiRuangan">1. Tiba di ruangan</label>
                                    <input type="text" class="form-control border-success" id="tibaDiRuangan" placeholder="21/09/2023">
                                </div>
                                <div class="col mb-3">
                                    <label for="asalRuangRawat">2. Asal Ruang Rawat</label>
                                    <select class="form-select border-success" id="asalRuangRawat">
                                        <option value="opsi1">ruang 1</option>
                                        <option value="opsi2">ruang 2</option>
                                        <option value="opsi3">ruang 3</option>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label for="keluhanUtama">3. Keluhan Utama</label>
                                    <select class="form-select border-success" id="keluhanUtama">
                                        <option value="lakiLaki">pusing</option>
                                        <option value="perempuan">Mual</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                                <p class="fs-5"><strong>Riwayat Kesehatan</strong></p>

                                <div class="row align-items-center">
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">1. Jenis Penyakit*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Tumor</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="keluhanUtama border-success">2. Riwayat Pasien*</label>
                                        <select class="form-select border-success" id="keluhanUtama">
                                            <option value="lakiLaki">Sakit</option>
                                        </select>
                                    </div>

                                    <div class="col-auto mb-3">
                                        <label for="keluhanUtama">3. Riwayat Alergi*</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                <label class="form-check-label" for="inlineRadio1 "></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="keluhanUtama">4. Riwayat Pengobatan*</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                <label class="form-check-label" for="inlineRadio3 "></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                                                <label class="form-check-label" for="inlineRadio4"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                        <div class="row align-items-center">
                                            <div class="col mb-3">
                                                <label for="asalRuangRawat">5.Riwayat Kesehtan Kluarga</label>
                                                <select class="form-select border-success" id="asalRuangRawat">
                                                    <option value="opsi1">Kluarga Cemara</option>
                                                </select>
                                            </div>
                                            <div class="col mb-3">
                                                <label for="tibaDiRuangan">Sebutkan</label>
                                                <input type="text" class="form-control border-success" id="tibaDiRuangan" placeholder="">
                                            </div>
                                            <div class="col mb-3">
                                                <label for="tibaDiRuangan">Sebutkan</label>
                                                <input type="text" class="form-control border-success" id="tibaDiRuangan" placeholder="">
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
                        B.STATUS SOSIAL, EKONOMI,SPRITUAL SUKU/BUDAYA, NILAI KEPERCAYAAN
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseB" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="column" id="bColumn">

                            <div class="row align-items-start">
                                <div class="col mb-3">
                                  <label for="">1.Pekerjaan Penanggung Jawab</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                                <div class="col mb-3">
                                  <label for="">2.Pendidikan Penagnggung Jawab</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                                <div class="col mb-3">
                                  <label for="">3.Spritual (Agama)</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                            </div>

                            <div class="row align-items-start">
                                <div class="col mb-3">
                                  <label for="">4.Suku Budaya</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                                <div class="col mb-3">
                                  <label for="">5.Nilai Kepercayaan Pasien / Kluarga</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                                <div class="col mb-3">
                                  <label for="">6.Status Psikologi Orang Tua</label>
                                  <input type="text" class="form-control  border-success" placeholder="Sudah Terisi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseC" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                        C.PEMERIKSAAN FUNGSIONAL DAN OBSTERI-GINEKOLOGI
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseC" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class="column" id="bColumn">

                            <p class="fs-5"><strong>1.Riwayat Mentruasi</strong></p>

                            <div class="row align-items-start">
                                <div class="col mb-3">
                                    <label for="tibaDiRuangan1">Manarche Umur (Tahun)*</label>
                                    <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                </div>
                                <div class="col mb-3">
                                    <label for="tibaDiRuangan2">Siklus (Hari)*</label>
                                    <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                </div>
                                <div class="col mb-3">
                                    <label for="asalRuangRawat">Siklus Mentruasi*</label>
                                    <select class="form-select border-success" id="asalRuangRawat">
                                        <option value="opsi1">Teratur</option>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label for="tibaDiRuangan3">Lama Mentruasi(Hari)*</label>
                                    <input type="text" class="form-control border-success" id="tibaDiRuangan3" placeholder="">
                                </div>
                            </div>

                                <div class="row align-items-start">
                                    <div class="col mb-3">
                                        <label for="tibaDiRuangan1">Volume</label>
                                        <input type="text" class="form-control form-control-sm border-success" id="tibaDiRuangan1" placeholder="">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="tibaDiRuangan1">Keluhan saat Haid*</label>
                                        <input type="text" class="form-control form-control-sm border-success" id="tibaDiRuangan1" placeholder="">
                                    </div>
                                </div>



                                <p class="fs-5"><strong>2.Riwayat Pernikahan</strong></p>

                                <div class="row align-items-start">
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Status Pernikahan*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Teratur</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="tibaDiRuangan1">Jumlah Menikah (Kali)*</label>
                                        <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="tibaDiRuangan2">Umur Pertama Nikah (Tahun)*</label>
                                        <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                    </div>
                                </div>

                                <p class="fs-5"><strong>3.Riwayat KB Terakhir</strong></p>

                                <div class="row align-items-start">
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Menggunakan KB*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">IYA</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Jenis KB*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Suntik</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="tibaDiRuangan1">Lama pernikahan (Tahun)*</label>
                                        <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                    </div>
                                </div>

                                <p class="fs-5"><strong>4.Riwayat Kesehatan</strong></p>

                                <div class="row align-items-start">
                                    <div class="col mb-3">
                                        <label for="tibaDiRuangan1">TGL/ Bulan Patrus*</label>
                                        <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Jenis Kelamin*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Pilih</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">ANC*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">pilih</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Penolong*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Pilih</option>
                                        </select>
                                    </div>
                                 </div>

                                 <div class="row align-items-start">
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">BB Lahir(Kg)*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Laki-Laki</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">BB Lahir(Kg)*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Pilih</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Anak Hidup / Meninggal*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Hidup</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Hidup Normal / Cacat*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Normal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Menyusui / Tidak*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">Nyusu</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <br>
                                        <button type="button" class="btn btn-primary">Tambahkan Ke Tabel</button>
                                    </div>
                                </div>

                                <table class="table text-center">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tgl/ Bln Patrus</th>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Umur Hamil</th>
                                            <th scope="col">Penolong</th>
                                            <th scope="col">Kelamin</th>
                                            <th scope="col">Bb Lahir</th>
                                            <th scope="col">Hidup</th>
                                            <th scope="col">Normal?</th>
                                            <th scope="col">Menyusi?</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">1</th>
                                            <td class="text-center">--------</td>
                                            <td class="text-center">--------</td>
                                            <td class="text-center">--------</td>
                                            <td class="text-center">--------</td>
                                            <td class="text-center">--------</td>
                                            <td class="text-center">--------</td>
                                            <td class="text-center">--------</td>
                                            <td class="text-center">--------</td>
                                            <td class="text-center">--------</td>
                                            <td>
                                                <div class="row justify-content-center">
                                                    <div class="col-auto">
                                                        <span class="edit-action" onclick="editRow(this)"><i class="fas fa-edit"></i></span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <span class="delete-action" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                      <tr>
                                        <th scope="row" class="text-center">2</th>
                                        <td class="text-center">--------</td>
                                        <td class="text-center">--------</td>
                                        <td class="text-center">--------</td>
                                        <td class="text-center">--------</td>
                                        <td class="text-center">--------</td>
                                        <td class="text-center">--------</td>
                                        <td class="text-center">--------</td>
                                        <td class="text-center">--------</td>
                                        <td class="text-center">--------</td>
                                        <td>
                                            <div class="row justify-content-center">
                                                <div class="col-auto">
                                                    <span class="edit-action" onclick="editRow(this)"><i class="fas fa-edit"></i></span>
                                                </div>
                                                <div class="col-auto">
                                                    <span class="delete-action" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                </table>

                                <p class="fs-5"><strong>5.Riwayat Hamil ini (Sekarang)</strong></p>

                                <div class="row align-items-start">
                                    <div class="col mb-3">
                                        <label for="tibaDiRuangan1">HPHT*</label>
                                        <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="tibaDiRuangan2">HPL*</label>
                                        <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="tibaDiRuangan3">Umur Pwernikahan(Tahun)*</label>
                                        <input type="text" class="form-control border-success" id="tibaDiRuangan3" placeholder="">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">ANC*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">YA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">ANC dengan*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">YA</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Frekuensi*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">YA</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Imunisasi TT*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">YA</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="asalRuangRawat">Keluhan Saat Hamil*</label>
                                        <select class="form-select border-success" id="asalRuangRawat">
                                            <option value="opsi1">YA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseD1" aria-expanded="true"
                                                    aria-controls="panelsStayOpen-collapseA1" style="font-weight: bold;">
                                                    PEMERIKSAAN UMUM
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseD1" class="accordion-collapse collapse show">
                                                <div class="accordion-body">
                                                    <div class="row align-items-start">
                                                        <div class="col mb-3">
                                                            <label for="tibaDiRuangan1">1.Nadi(X/mnt)*</label>
                                                            <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="tibaDiRuangan2">5.BB(Kg)*</label>
                                                            <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-start">
                                                        <div class="col mb-3">
                                                            <label for="tibaDiRuangan1">2.Sb02(%)*</label>
                                                            <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="tibaDiRuangan2">6.TB(cm)*</label>
                                                            <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-start">
                                                        <div class="col mb-3">
                                                            <label for="tibaDiRuangan1">3.Td(mmHg)*</label>
                                                            <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="tibaDiRuangan2">7.Lila(cm)*</label>
                                                            <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-start">
                                                        <div class="col mb-3">
                                                            <label for="tibaDiRuangan1">4.Nafas(X/mnt)*</label>
                                                            <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="tibaDiRuangan2">8.Suhu(C)*</label>
                                                            <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseD2" aria-expanded="true"
                                                    aria-controls="panelsStayOpen-collapseA2" style="font-weight: bold;">
                                                    PEMERIKSAAN MUKA / MATA
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseD2" class="accordion-collapse collapse show">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="keluhanUtama">1. Odema*</label>
                                                            <div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                    <label class="form-check-label" for="inlineRadio1 ">iya</label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="keluhanUtama">2. Konjungtiva*</label>
                                                            <div>
                                                                <div class="form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                    <label class="form-check-label" for="inlineRadio1 ">Normal</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                    <label class="form-check-label" for="inlineRadio2">Pucat</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="keluhanUtama">3. Skelera*</label>
                                                            <div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input " type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                    <label class="form-check-label" for="inlineRadio1 ">Putih</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input " type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                    <label class="form-check-label" for="inlineRadio2">Kuning</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option3">
                                                                    <label class="form-check-label" for="inlineRadio2">Merah</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="keluhanUtama">4. Gangguan Visus*</label>
                                                            <div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row justify-content-center" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                    <label class="form-check-label" for="inlineRadio1 ">Iya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row justify-content-center" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseD3" aria-expanded="true" aria-controls="panelsStayOpen-collapseA3"
                                                    style="font-weight: bold;">
                                                    PEMERIKSAAN DADA & PAYUDARA (1)
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseD3" class="accordion-collapse collapse show">
                                                <div class="accordion-body">
                                                    <div class="row align-items-start">
                                                        <div class="col mb-3">
                                                            <label for="asalRuangRawat">Dada*</label>
                                                            <select class="form-select border-success" id="asalRuangRawat">
                                                                <option value="opsi1">YA</option>
                                                            </select>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="asalRuangRawat">Pengeluaran*</label>
                                                            <select class="form-select border-success" id="asalRuangRawat">
                                                                <option value="opsi1">YA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-start">
                                                        <div class="col mb-3">
                                                            <label for="asalRuangRawat">Puting Susu*</label>
                                                            <select class="form-select border-success" id="asalRuangRawat">
                                                                <option value="opsi1">YA</option>
                                                            </select>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="asalRuangRawat">Kelainan*</label>
                                                            <select class="form-select border-success" id="asalRuangRawat">
                                                                <option value="opsi1">YA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseD5" aria-expanded="true" aria-controls="panelsStayOpen-collapseA5"
                                                    style="font-weight: bold;">
                                                    PEMERIKSAAN DADA & PAYUDARA (2)
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseD5" class="accordion-collapse collapse show">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="keluhanUtama">1. Oedem*</label>
                                                            <div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                    <label class="form-check-label" for="inlineRadio1 "></label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                    <label class="form-check-label" for="inlineRadio2"></label>
                                                                </div>
                                                            </div>
                                                            <img width="160" height="164" src="https://img.icons8.com/external-global-made-by-made/100/external-Plus-ui-and-ux-global-made-by-made.png" alt="external-Plus-ui-and-ux-global-made-by-made"/>
                                                        </div>

                                                        <div class="col mb-3">
                                                            <label for="keluhanUtama">2. Reflek Patella*</label>
                                                            <div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                                    <label class="form-check-label" for="inlineRadio3 "></label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                                                                    <label class="form-check-label" for="inlineRadio4"></label>
                                                                </div>
                                                                <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseD4" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseA4" style="font-weight: bold;">
                                                PEMERIKSAAN ABDOMEN
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseD4" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="col-auto mb-3">
                                                    <label for="keluhanUtama">1. Luka Bekas Operasi*</label>
                                                    <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1 ">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">Ada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto mb-3">
                                                    <label for="keluhanUtama">2. Massa*</label>
                                                    <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1 ">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">Ada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto mb-3">
                                                    <label for="keluhanUtama">3. Nyeri Tekan*</label>
                                                    <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1 ">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">Ada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto mb-3">
                                                    <label for="keluhanUtama">4. Bising Usus*</label>
                                                    <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1 ">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">Ada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-start">
                                                    <div class="col mb-3">
                                                        <label for="tibaDiRuangan1">5.Palpasi(TFU/cm)*</label>
                                                        <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label for="tibaDiRuangan2">7.DJJ(x/mnt)*</label>
                                                        <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row align-items-start">
                                                    <div class="col mb-3">
                                                        <label for="tibaDiRuangan1">6.Letak*</label>
                                                        <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label for="tibaDiRuangan2">8.His(x/mnt)*</label>
                                                        <input type="text" class="form-control border-success" id="tibaDiRuangan2" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseD" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                                    GENETALIA
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseD" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="column" id="dColumn">

                                        <form action="/action_page.php">
                                            <div style="display: flex; justify-content: space-between;">

                                              <div style="display: align-items: center;">
                                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                <label for="vehicle1">flour Albus</label>
                                              </div>

                                              <div style="display: align-items: center;">
                                                <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                                <label for="vehicle2">Abses Bartholin</label>
                                              </div>

                                              <div style="display: align-items: center;">
                                                <input type="checkbox" id="vehicle3" name="vehicle3" value="Car">
                                                <label for="vehicle3">Fluxsus</label>
                                              </div>

                                              <div style="display: align-items: center;">
                                                <input type="checkbox" id="vehicle4" name="vehicle4" value="Boat">
                                                <label for="vehicle4">labra kiri</label>
                                              </div>

                                              <div style="display: align-items: center;">
                                                <input type="checkbox" id="vehicle4" name="vehicle4" value="Boat">
                                                <label for="vehicle4">varises</label>
                                              </div>

                                              <div style="display: align-items: center;">
                                                <input type="checkbox" id="vehicle4" name="vehicle4" value="Boat">
                                                <label for="vehicle4">labra kanan</label>
                                              </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-start">
                            <div class="col-5 mb-3">
                                <label for="tibaDiRuangan1">Pemeriksaan Dalam (Vagina Thoucher / Rectal Toucher, Inspekulo)</label>
                                <input type="text" class="form-control border-success" id="tibaDiRuangan1" placeholder="">
                            </div>
                            <div class="col mb-3">
                                <label for="asalRuangRawat">Laboratorium</label>
                                <select class="form-select border-success" id="asalRuangRawat">
                                    <option value="opsi1">YA</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="asalRuangRawat">USG</label>
                                <select class="form-select border-success" id="asalRuangRawat">
                                    <option value="opsi1">YA</option>
                                </select>
                            </div>
                        </div>

                      </div>
                   </div>
                </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseD" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                                D.PENGKAJIAN NYERI
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseD" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col">
                                            <label for="NRS/VA*">1.NRSA/VA*</label>
                                            <input type="range" min="0" max="10" step="1">

                                                <div class="range-labels">
                                                    <span>0 <br>Tidak <br>Nyeri</span>
                                                    <span>1</span>
                                                    <span>2</span>
                                                    <span>3</span>
                                                    <span>4</span>
                                                    <span>5<br>Nyeri<br>Sedang</span>
                                                    <span>6</span>
                                                    <span>7</span>
                                                    <span>8</span>
                                                    <span>9</span>
                                                    <span>10<br>Nyeri<br>Sangat Hebat</span>
                                                </div>
                                           </div>

                                     <div class="col" style="margin-left: 150px;">
                                         <label for ="NRS/VA*">2.Wrong Baker Face Scale*</label>
                                        <div style="display: flex; flex-direction: row; align-items: center;">
                                            <div style="display: flex; flex-direction: column; align-items: center;">
                                            <img width="90" height="90" src="https://img.icons8.com/ios/50/smiling.png" alt="smiling" title="0"/>
                                            <span >0</span>
                                            <span> No Hurts <br>.</span>
                                            </div>
                                            <div style="display: flex; flex-direction: column; align-items: center;">
                                            <img width="90" height="90" src="https://img.icons8.com/ios/50/happy--v1.png" alt="happy--v1" title="2"/>
                                            <span>2</span>
                                            <span class="text-center">Hurts <br>Lite Bit</span>
                                            </div>
                                            <div style="display: flex; flex-direction: column; align-items: center;">
                                            <img width="90" height="90" src="https://img.icons8.com/ios/50/embarrassed--v1.png" alt="embarrassed--v1" title="4"/>
                                            <span>4</span>
                                            <span class="text-center">Hurts <br>Lite More</span>
                                            </div>
                                            <div style="display: flex; flex-direction: column; align-items: center;">
                                            <img width="90" height="90" src="https://img.icons8.com/ios/50/sad.png" alt="sad" title="6"/>
                                            <span>6</span>
                                            <span class="text-center">Hurts <br>Even More</span>
                                            </div>
                                            <div style="display: flex; flex-direction: column; align-items: center;">
                                            <img width="90" height="90" src="https://img.icons8.com/ios/50/sleeping--v1.png" alt="sleeping--v1" title="8"/>
                                            <span>8</span>
                                            <span class="text-center">Hurts <br>Whole Lot</span>
                                            </div>
                                            <div style="display: flex; flex-direction: column; align-items: center;">
                                            <img width="90" height="90" src="https://img.icons8.com/ios/50/crying--v1.png" alt="crying--v1" title="10"/>
                                            <span>10</span>
                                            <span>Hurts <br>Worst</span>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="row align-items-start">
                                        <div class="col-4 mb-3">
                                            <label for="asalRuangRawat">Nyeri*</label>
                                            <select class="form-select border-success" id="asalRuangRawat">
                                                <option value="opsi1">YA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <p class="fs-5"><strong>BEHAVIOR PAIN SCALE</strong></p>

                                    <div class="row align-items-start">
                                        <div class="col mb-3">
                                            <label for="asalRuangRawat">Ekpresi Wajah*</label>
                                            <select class="form-select border-success" id="asalRuangRawat">
                                                <option value="opsi1">YA</option>
                                            </select>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="asalRuangRawat">Extrimitas Atas*</label>
                                            <select class="form-select border-success" id="asalRuangRawat">
                                                <option value="opsi1">YA</option>
                                            </select>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="asalRuangRawat">Compliance Terhadap Ventilator*</label>
                                            <select class="form-select border-success" id="asalRuangRawat">
                                                <option value="opsi1">YA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseE" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                                E.PENILAIAN RESIKO JATUH PASIEN DEWASA (FALL MORSE SCALE)
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseE" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="column" id="eColumn">

                                    <div class="row align-items-start">
                                        <div class="col mb-3">
                                            <label for="asalRuangRawat">1. Riwayat jatuh yang baru atau dalam 3 bulan terakhir*</label>
                                            <select class="form-select border-success" id="asalRuangRawat">
                                                <option value="opsi1">ruang 1</option>
                                                <option value="opsi2">ruang 2</option>
                                                <option value="opsi3">ruang 3</option>
                                            </select>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="keluhanUtama">2. Diagnosa Medis Skunder*</label>
                                            <select class="form-select border-success" id="keluhanUtama">
                                                <option value="lakiLaki">pusing</option>
                                                <option value="perempuan">Mual</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="keluhanUtama">3. Menggunakan Alat Bantu Jalan*</label>
                                            <select class="form-select border-success" id="keluhanUtama">
                                                <option value="lakiLaki">pusing</option>
                                                <option value="perempuan">Mual</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-start">
                                        <div class="col mb-3">
                                            <label for="asalRuangRawat">4. Menggunakan Infus*</label>
                                            <select class="form-select border-success" id="asalRuangRawat">
                                                <option value="opsi1">ruang 1</option>
                                                <option value="opsi2">ruang 2</option>
                                                <option value="opsi3">ruang 3</option>
                                            </select>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="keluhanUtama">5. Cara Belajar / Pindah</label>
                                            <select class="form-select border-success" id="keluhanUtama">
                                                <option value="lakiLaki">pusing</option>
                                                <option value="perempuan">Mual</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="keluhanUtama">6. Status Mental*</label>
                                            <select class="form-select border-success" id="keluhanUtama">
                                                <option value="lakiLaki">pusing</option>
                                                <option value="perempuan">Mual</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-start">
                                        <div class="col-4 mb-3">
                                            <label for="tibaDiRuangan">Total Score Dewasa</label>
                                            <input type="text" class="form-control border-success" id="tibaDiRuangan" placeholder="0">
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="tibaDiRuangan">Total Score</label>
                                            <input type="text" class="form-control border-success" id="tibaDiRuangan" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseF" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                                F.DIAGNOSA
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseF" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="column" id="fColumn">

                                    <div class="row align-items-start">
                                        <div class="col mb-3">
                                            <label for="tibaDiRuangan">Diagnosa*</label>
                                            <input type="text" class="form-control border-success" id="tibaDiRuangan" placeholder="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-success text-dark rounded-3" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseG" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseA" style="font-weight: bold;">
                                G.PENATALAKSANAAN (P)
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseG" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="column" id="gColumn">

                                    <div class="row align-items-start">
                                        <div class="col-3 mb-3">
                                            <label for="tibaDiRuangan">Jam</label>
                                            <input type="text" class="form-control border-success" id="tibaDiRuangan" placeholder="0">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="tibaDiRuangan">keterangan</label>
                                            <input type="text" class="form-control border-success" id="tibaDiRuangan" placeholder="0">
                                        </div>
                                    </div>
                                    <p><a href="#">Tambah Baru</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr style="border: 1px dashed #000306; margin: 20px 0;">
                <div class="line"></div>

                <div class="button-container">
                    <button>Kembali</button>
                    <button>Simpan</button>
                </div>

                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            </body>

            </html> --}}


@endsection
