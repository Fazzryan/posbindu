@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Edit Data Wawancara - Posbindu</title>
    <meta content="Halaman Edit Data Wawancara Posbindu" name="description">
    <meta content="Dinda Fazryan" name="author">
    <meta content="Posbindu" name="keywords">
@endpush
@push('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/be/libs/selectpicker/bootstrap-select.min.css') }}">
@endpush
@push('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pt-3 pb-md-1">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <nav aria-label="breadcrumb">
                                <h4>Edit Data Wawancara</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('be.wawancara.list') }}">Data
                                            Wawancara</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-5 text-start text-md-end">
                            <a href="{{ route('be.wawancara.list') }}" class="btn btn-dark fw-bolder">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('be.layouts.app_session')
                    <div class="card w-100 border">
                        <div class="card-body p-4">
                            <form action="{{ route('be.wawancara.act_edit') }}" method="post">
                                @csrf
                                <input type="hidden" id="edt-wawancara_id" name="wawancara_id" value="{{ $getWawan->id }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="add-user_id" class="form-label">Pilih Pasien</label>
                                            {{-- <input type="text" name="" value="{{ $getWawan->nm_lengkap }}"> --}}
                                            <select class="selectpicker form-control fw-semibold border border-light"
                                                id="add-user_id" name="user_id" data-style="select-with-transition"
                                                data-size="1">
                                                <option value="{{ $getPasien->id }}">{{ $getPasien->nm_lengkap }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Input</label>
                                            <input type="date" class="form-control" name="tgl_input"
                                                value="{{ $getWawan->tgl_input }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="card-title">Asesmen Faktor Resiko</h6>
                                <p class="card-subtitle mb-3">Silahkan isi formulir faktor resiko dibawah ini dengan benar.
                                </p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Riwayat Sakit Keluarga</label>
                                            <select id="edt-r_sakit_kel" name="r_sakit_kel" class="form-select">
                                                <option value="tidak ada">Tidak Ada</option>
                                                <option value="diabetes">Diabetes</option>
                                                <option value="penyakit jantung">Penyakit Jantung</option>
                                                <option value="hipertensi">Hipertensi</option>
                                                <option value="benjolan/tumor">Benjolan/Tumor</option>
                                                <option value="stroke">Stroke</option>
                                                <option value="asma">Asma</option>
                                                <option value="lainnya">Lainnya</option>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Riwayat PTM Sendiri</label>
                                            <select id="edt-r_sakit_man" name="r_sakit_man" class="form-select">
                                                <option value="tidak ada">Tidak Ada</option>
                                                <option value="diabetes">Diabetes</option>
                                                <option value="riwayat cidera">Riwayat Cidera</option>
                                                <option value="asma">Asma</option>
                                                <option value="hipertensi">Hipertensi</option>
                                                <option value="stroke">Stroke</option>
                                                <option value="ppok">PPOK</option>
                                                <option value="penyakit jantung">Penyakit Jantung</option>
                                                <option value="lainnya">Lainnya</option>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Status Kesehatan Anda
                                                Dalam Satu Tahun Terakhir?</label>
                                            <select id="edt-stat_kes_bln_ter" name="stat_kes_bln_ter" class="form-select">
                                                <option value="sangat sehat">Sangat Sehat</option>
                                                <option value="sehat">Sehat</option>
                                                <option value="tidak sehat">Tidak Sehat</option>
                                                <option value="kurang sehat">Kurang Sehat</option>
                                                <option value="sangat tidak sehat">Sangat Tidak Sehat</option>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bagaimana Status
                                                Kesehatan Anda Saat Ini?</label>
                                            <select id="edt-stat_kes_bln_skrg" name="stat_kes_bln_skrg"
                                                class="form-select">
                                                <option value="lebih baik">Lebih Baik</option>
                                                <option value="lebih buruk">Lebih Buruk</option>
                                                <option value="sama dengan bulan sebelumnya">Sama Dengan Bulan Sebelumnya
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="card-title">Asesmen Pola Hidup Sehat</h6>
                                <p class="card-subtitle mb-3">Silahkan isi formulir pola hidup sehat dibawah ini dengan
                                    benar.</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Apakah Anda Melakukan Aktivitas Fisik Selama 30 Menit
                                                Setiap Hari?</label>
                                            <select id="edt-aktivitas_fisik" name="aktivitas_fisik" class="form-select">
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Tidak</option>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Apakah Anda Mengkonsumsi Sayur dan Buah Setiap
                                                Hari?</label>
                                            <select id="edt-kons_sayur_buah" name="kons_sayur_buah" class="form-select">
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Tidak</option>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Apakah Anda Pernah Merokok?</label>
                                            <select id="edt-merokok" name="merokok" class="form-select">
                                                <option value="pernah">Pernah</option>
                                                <option value="tidak pernah">Tidak Pernah</option>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Apakah Anda Pernah Mengkonsumsi Alkohol?</label>
                                            <select id="edt-alkohol" name="alkohol" class="form-select">
                                                <option value="pernah">Pernah</option>
                                                <option value="tidak pernah">Tidak Pernah</option>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary fw-semibold">Ubah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/be/libs/selectpicker/bootstrap-select.min.js') }}"></script>

    <script>
        $("#edt-r_sakit_kel").val("{{ $getWawan->r_sakit_kel }}");
        $("#edt-r_sakit_man").val("{{ $getWawan->r_sakit_man }}");
        $("#edt-stat_kes_bln_ter").val("{{ $getWawan->stat_kes_bln_ter }}");
        $("#edt-stat_kes_bln_skrg").val("{{ $getWawan->stat_kes_bln_skrg }}");
        $("#edt-aktivitas_fisik").val("{{ $getWawan->aktivitas_fisik }}");
        $("#edt-kons_sayur_buah").val("{{ $getWawan->kons_sayur_buah }}");
        $("#edt-merokok").val("{{ $getWawan->merokok }}");
        $("#edt-alkohol").val("{{ $getWawan->alkohol }}");
    </script>
@endpush
