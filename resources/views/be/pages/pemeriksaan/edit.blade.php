@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Edit Pemeriksaan - Posbindu</title>
    <meta content="Halaman Edit Pemeriksaan Posbindu" name="description">
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
                                <h4>Edit Data Pemeriksaan</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('be.pemeriksaan.list') }}">Data
                                            Pemeriksaan</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-5 text-start text-md-end">
                            <a href="{{ route('be.pemeriksaan.list') }}" class="btn btn-dark fw-bolder">Kembali</a>
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
                            <form action="{{ route('be.pemeriksaan.act_edit') }}" method="post">
                                @csrf
                                <input type="hidden" id="edt-pemeriksaan_id" name="pemeriksaan_id"
                                    value="{{ $getPemeriksaan->id }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="edt-user_id" class="form-label">Pilih Pasien</label>
                                            <select class="selectpicker form-control fw-semibold border border-light"
                                                id="edt-user_id" name="user_id" data-style="select-with-transition">
                                                <option value="{{ $getPasien->id }}">{{ $getPasien->nm_lengkap }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Input</label>
                                            <input type="date" class="form-control" name="tgl_input"
                                                value="{{ $getPemeriksaan->tgl_input }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                {{-- <h6 class="card-title">Keluhan Utama</h6> --}}
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Keluhan Utama</label>
                                        <input type="text"
                                            class="form-control @error('keluhan_utama') is-invalid @enderror"
                                            name="keluhan_utama" value="{{ $getPemeriksaan->keluhan_utama }}">
                                        @error('keluhan_utama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="edt-tekanan_darah" class="form-label">Tekanan Darah</label>
                                            <input type="text" id="edt-tekanan_darah" name="tekanan_darah"
                                                class="form-control @error('tekanan_darah') is-invalid @enderror"
                                                value="{{ $getPemeriksaan->tekanan_darah }}">
                                            @error('tekanan_darah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-bb" class="form-label">Berat Badan</label>
                                            <input type="number" id="edt-bb" name="bb"
                                                class="form-control @error('bb') is-invalid @enderror"
                                                value="{{ $getPemeriksaan->bb }}">
                                            @error('bb')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-gula_darah" class="form-label">Gula Darah</label>
                                            <input type="text" id="edt-gula_darah" name="gula_darah"
                                                class="form-control @error('gula_darah') is-invalid @enderror"
                                                value="{{ $getPemeriksaan->gula_darah }}">
                                            @error('gula_darah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <label for="edt-sistol" class="form-label">Sistol</label>
                                                <input type="text" id="edt-sistol" name="sistol"
                                                    class="form-control @error('sistol') is-invalid @enderror"
                                                    value="{{ $getPemeriksaan->sistol }}">
                                                @error('sistol')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <label for="edt-diastol" class="form-label">Diastol</label>
                                                <input type="text" id="edt-diastol" name="diastol"
                                                    class="form-control @error('diastol') is-invalid @enderror"
                                                    value="{{ $getPemeriksaan->diastol }}">
                                                @error('diastol')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kolesterol</label>
                                            <input type="text"
                                                class="form-control @error('kolesterol') is-invalid @enderror"
                                                name="kolesterol" value="{{ $getPemeriksaan->kolesterol }}">
                                            @error('kolesterol')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Asam Urat</label>
                                            <input type="text"
                                                class="form-control @error('asam_urat') is-invalid @enderror"
                                                name="asam_urat" value="{{ $getPemeriksaan->asam_urat }}">
                                            @error('asam_urat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
@endpush
