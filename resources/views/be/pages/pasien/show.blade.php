@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Data Pasien - Posbindu</title>
    <meta content="Halaman Data Pasien Posbindu" name="description">
    <meta content="Dinda Fazryan" name="author">
    <meta content="Posbindu" name="keywords">
@endpush
@push('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/be/css/datatables.min.css') }}" />
@endpush
@push('breadcrumb')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pt-3 pb-md-1">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb">
                                <h4>Data Pasien</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('be.pasien.list') }}">Data Pasien</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('be.pasien.list') }}" class="btn btn-dark fw-semibold">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- data diri --}}
                        <div class="col-lg-6">
                            <div class="card w-100 border">
                                <div class="card-body p-4">
                                    <h4 class="card-title">Data Diri Pasien</h4>
                                    {{-- <p class="card-subtitle mb-4">Silakan isi data diri anda dengan benar.</p> --}}
                                    <dl class="row mt-4 text-dark">
                                        <dt class="col-sm-4">Nama Lengkap</dt>
                                        <dd class="col-sm-8 text-capitalize"> {{ $getPasien->nm_lengkap }}</dd>

                                        <dt class="col-sm-4">NIK</dt>
                                        <dd class="col-sm-8"> {{ $getPasien->nik }}</dd>

                                        <dt class="col-sm-4">Tempat/Tanggal Lahir</dt>
                                        <dd class="col-sm-8 text-capitalize">
                                            {{ $getPasien->tmp_lahir }},
                                            {{ Carbon\Carbon::parse($getPasien->tgl_lahir)->translatedFormat('d F Y') }}
                                        </dd>

                                        <dt class="col-sm-4">Jenis Kelamin</dt>
                                        <dd class="col-sm-8">
                                            {{ $getPasien->jenis_kelamin == 'perempuan' ? 'Perempuan' : 'Laki-Laki' }}</dd>

                                        <dt class="col-sm-4">Golongan Darah</dt>
                                        <dd class="col-sm-8"> {{ $getPasien->goldar }}</dd>

                                        <dt class="col-sm-4">Nomor Telepon</dt>
                                        <dd class="col-sm-8"> {{ $getPasien->no_hp }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        {{-- alamat --}}
                        <div class="col-lg-6">
                            <div class="card w-100 border">
                                <div class="card-body p-4">
                                    <h4 class="card-title">Alamat Tempat Tinggal</h4>
                                    {{-- <p class="card-subtitle mb-4">Silakan isi data diri anda dengan benar.</p> --}}
                                    <dl class="row mt-4 text-dark">
                                        <dt class="col-sm-4">Alamat</dt>
                                        <dd class="col-sm-8"> {{ $getPasien->alamat }}</dd>

                                        <dt class="col-sm-4">RW/RW</dt>
                                        <dd class="col-sm-8"> {{ $getPasien->rt }}/{{ $getPasien->rw }}</dd>

                                        <dt class="col-sm-4">Kelurahan/Desa</dt>
                                        <dd class="col-sm-8"> {{ $getPasien->keldes }}</dd>

                                        <dt class="col-sm-4">Kecamatan</dt>
                                        <dd class="col-sm-8"> {{ $getPasien->kecamatan }}</dd>

                                        <dt class="col-sm-4">Agama</dt>
                                        <dd class="col-sm-8 text-capitalize"> {{ $getPasien->agama }}</dd>

                                        <dt class="col-sm-4">Status Perkawinan</dt>
                                        <dd class="col-sm-8">
                                            {{ $getPasien->status_kawin == 'menikah' ? 'Menikah' : 'Belum Menikah' }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        {{-- akun --}}
                        <div class="col-lg-6">
                            <div class="card w-100 border">
                                <div class="card-body p-4">
                                    <h4 class="card-title">Akun</h4>
                                    {{-- <p class="card-subtitle mb-4">Silakan isi data diri anda dengan benar.</p> --}}
                                    <dl class="row mt-4 text-dark">
                                        <dt class="col-sm-4">Email</dt>
                                        <dd class="col-sm-8"> {{ $getPasien->email }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
