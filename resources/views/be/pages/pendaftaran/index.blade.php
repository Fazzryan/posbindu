@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Pendafataran Pasien - Posbindu</title>
    <meta content="Halaman Pendafataran Posbindu" name="description">
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
                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb">
                                <h4>Pendafataran Pasien</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pendafataran Pasien Baru</li>
                                </ol>
                            </nav>
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
                    @include('be.layouts.app_session')
                    <div class="card w-100 border">
                        <div class="card-body p-4">
                            <h4 class="card-title">Data Diri</h4>
                            <p class="card-subtitle mb-4">Silakan isi data diri anda dengan benar.</p>
                            <form action="{{ route('be.pendaftaran.act_add') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="add-nm_lengkap" class="form-label">Nama Lengkap</label>
                                            <input type="text" id="add-nm_lengkap" name="nm_lengkap"
                                                class="form-control @error('nm_lengkap') is-invalid @enderror"
                                                value="{{ old('nm_lengkap') }}">
                                            @error('nm_lengkap')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-nik" class="form-label">NIK</label>
                                            <input type="text" id="add-nik" name="nik"
                                                class="form-control @error('nik') is-invalid @enderror"
                                                value="{{ old('nik') }}">
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <label for="add-tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="add-tgl_lahir" name="tgl_lahir"
                                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                    value="{{ old('tgl_lahir') }}">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <label for="add-tmp_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="add-tmp_lahir" name="tmp_lahir"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    value="{{ old('tmp_lahir') }}">
                                                @error('tmp_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="add-jenis_kelamin" class="form-select">
                                                <option value="laki_laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-goldar" class="form-label">Golongan Darah</label>
                                            <input type="text" id="add-goldar" name="goldar"
                                                class="form-control @error('goldar') is-invalid @enderror"
                                                value="{{ old('goldar') }}" maxlength="4">
                                            @error('goldar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-no_hp" class="form-label">Nomor Telepon</label>
                                            <input type="number" id="add-no_hp" name="no_hp"
                                                class="form-control @error('no_hp') is-invalid @enderror"
                                                value="{{ old('no_hp') }}">
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="add-alamat" class="form-label">Alamat</label>
                                            <input type="text" id="add-alamat" name="alamat"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                value="{{ old('alamat') }}">
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="add-rt" class="form-label">RT</label>
                                                    <input type="number" id="add-rt" name="rt"
                                                        class="form-control @error('rt') is-invalid @enderror"
                                                        value="{{ old('rt') }}">
                                                    @error('rt')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label for="add-rw" class="form-label">RW</label>
                                                    <input type="number" id="add-rw" name="rw"
                                                        class="form-control @error('rw') is-invalid @enderror"
                                                        value="{{ old('rw') }}">
                                                    @error('rw')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-keldes" class="form-label">Kel/Desa</label>
                                            <input type="text" id="add-keldes" name="keldes"
                                                class="form-control @error('keldes') is-invalid @enderror"
                                                value="{{ old('keldes') }}">
                                            @error('keldes')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-kecamatan" class="form-label">Kecamatan</label>
                                            <input type="text" id="add-kecamatan" name="kecamatan"
                                                class="form-control @error('kecamatan') is-invalid @enderror"
                                                value="{{ old('kecamatan') }}">
                                            @error('kecamatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-agama" class="form-label">Agama</label>
                                            <select name="agama" id="add-agama" class="form-select">
                                                <option value="islam">Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="add-status_kawin" class="form-label">Status Perkawinan</label>
                                            <select name="status_kawin" id="add-status_kawin" class="form-select">
                                                <option value="belum_menikah">Belum Menikah</option>
                                                <option value="menikah">Menikah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <h4 class="card-title">Akun Pasien</h4>
                                    <p class="card-subtitle mb-4">Silakan isi email dan password untuk membuat akun.</p>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="add-email" class="form-label">Email</label>
                                            <input type="email" id="add-email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"id="password"
                                                name="password">
                                            <button class="btn btn-light d-flex align-items-center" type="button"
                                                id="btn-show-hide" onclick="showHidePass()">
                                                <iconify-icon icon="solar:eye-broken" width="1.2em" height="1.2em"
                                                    class="d-block" id="show-icon"></iconify-icon>
                                                <iconify-icon icon="solar:eye-closed-broken" width="1.2em"
                                                    height="1.2em" class="d-none" id="hide-icon"></iconify-icon>
                                            </button>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary fw-bolder">Tambah Pasien</button>
                                    </div>
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
    <script>
        function showHidePass() {
            var $password = $("#password");
            var $hideIcon = $("#hide-icon");
            var $showIcon = $("#show-icon");

            var isPassword = $password.attr("type") === "password";

            $password.attr("type", isPassword ? "text" : "password");

            $hideIcon.toggleClass("d-none d-block", !isPassword); // !isPassword -> isPassword == false
            $showIcon.toggleClass("d-none d-block", isPassword); // isPassword -> isPassword == true
        }
    </script>
@endpush
