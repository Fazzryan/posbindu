@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Edit Data Pasien - Posbindu</title>
    <meta content="Halaman Edit Data Pasien Posbindu" name="description">
    <meta content="Dinda Fazryan" name="author">
    <meta content="Posbindu" name="keywords">
@endpush
@push('breadcrumb')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pt-3 pb-md-1">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb">
                                <h4>Edit Data Pasien</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('be.pasien.list') }}">Data Pasien</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    @include('be.layouts.app_session')
                    <div class="card w-100 border">
                        <div class="card-body p-4">
                            <h4 class="card-title">Data Diri</h4>
                            <p class="card-subtitle mb-4">Silakan isi data diri anda dengan benar.</p>
                            <form action="{{ route('be.pasien.act_edit') }}" method="post">
                                @csrf
                                <input type="hidden" id="edt-user_id" name="user_id" value="{{ $getPasien->id }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="edt-nm_lengkap" class="form-label">Nama Lengkap</label>
                                            <input type="text" id="edt-nm_lengkap" name="nm_lengkap"
                                                class="form-control @error('nm_lengkap') is-invalid @enderror"
                                                value="{{ $getPasien->nm_lengkap }}">
                                            @error('nm_lengkap')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-nik" class="form-label">NIK</label>
                                            <input type="text" id="edt-nik" name="nik"
                                                class="form-control @error('nik') is-invalid @enderror"
                                                value="{{ $getPasien->nik }}">
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <label for="edt-tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" id="edt-tgl_lahir" name="tgl_lahir"
                                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                    value="{{ $getPasien->tgl_lahir }}">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <label for="edt-tmp_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" id="edt-tmp_lahir" name="tmp_lahir"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    value="{{ $getPasien->tmp_lahir }}">
                                                @error('tmp_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="edt-jenis_kelamin" class="form-select">
                                                <option value="laki_laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-goldar" class="form-label">Golongan Darah</label>
                                            <input type="text" id="edt-goldar" name="goldar"
                                                class="form-control @error('goldar') is-invalid @enderror"
                                                value="{{ $getPasien->goldar }}" maxlength="4">
                                            @error('goldar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-no_hp" class="form-label">Nomor Telepon</label>
                                            <input type="number" id="edt-no_hp" name="no_hp"
                                                class="form-control @error('no_hp') is-invalid @enderror"
                                                value="{{ $getPasien->no_hp }}">
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="edt-alamat" class="form-label">Alamat</label>
                                            <input type="text" id="edt-alamat" name="alamat"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                value="{{ $getPasien->alamat }}">
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="edt-rt" class="form-label">RT</label>
                                                    <input type="number" id="edt-rt" name="rt"
                                                        class="form-control @error('rt') is-invalid @enderror"
                                                        value="{{ $getPasien->rt }}">
                                                    @error('rt')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label for="edt-rw" class="form-label">RW</label>
                                                    <input type="number" id="edt-rw" name="rw"
                                                        class="form-control @error('rw') is-invalid @enderror"
                                                        value="{{ $getPasien->rw }}">
                                                    @error('rw')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-keldes" class="form-label">Kel/Desa</label>
                                            <input type="text" id="edt-keldes" name="keldes"
                                                class="form-control @error('keldes') is-invalid @enderror"
                                                value="{{ $getPasien->keldes }}">
                                            @error('keldes')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-kecamatan" class="form-label">Kecamatan</label>
                                            <input type="text" id="edt-kecamatan" name="kecamatan"
                                                class="form-control @error('kecamatan') is-invalid @enderror"
                                                value="{{ $getPasien->kecamatan }}">
                                            @error('kecamatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-agama" class="form-label">Agama</label>
                                            <select name="agama" id="edt-agama" class="form-select">
                                                <option value="islam">Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edt-status_kawin" class="form-label">Status Perkawinan</label>
                                            <select name="status_kawin" id="edt-status_kawin" class="form-select">
                                                <option value="belum_menikah">Belum Menikah</option>
                                                <option value="menikah">Menikah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end">
                                        <a href="{{ route('be.pasien.list') }}"
                                            class="btn bg-danger-subtle text-danger fw-semibold me-2">Batal</a>
                                        <button type="submit" class="btn btn-primary fw-bolder">Edit Data</button>
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
        $("#edt-agama").val("{{ $getPasien->agama }}");
        $("#edt-jenis_kelamin").val("{{ $getPasien->jenis_kelamin }}");
        $("#edt-status_kawin").val("{{ $getPasien->status_kawin }}");
    </script>
@endpush
