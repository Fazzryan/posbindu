@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Tambah Profile - Posbindu</title>
    <meta content="Halaman Tambah Profile Posbindu" name="description">
    <meta content="Dinda Fazryan" name="author">
    <meta content="Posbindu" name="keywords">
@endpush
@push('custom-css')
@endpush
@push('breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pt-3 pb-md-1">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <nav aria-label="breadcrumb">
                                <h4>Profile Petugas</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('be.profile.list') }}">Profile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-5 text-end">
                            <a href="{{ route('be.profile.list') }}" class="btn btn-dark fw-bolder">Kembali</a>
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
                    <h6 class="card-title">Data Diri</h6>
                    <p class="card-subtitle mb-4">Silahkan Tambah data diri anda disini.</p>
                    <form action="{{ route('be.profile.act_add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control text-capitalize" name="nm_lengkap">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor HP</label>
                                    <input type="number" class="form-control" name="no_hp">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select">
                                        <option value="laki_laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <button class="btn btn-light d-flex align-items-center" type="button"
                                        id="btn-show-hide" onclick="showHidePass()">
                                        <iconify-icon icon="solar:eye-broken" width="1.2em" height="1.2em" class="d-block"
                                            id="show-icon"></iconify-icon>
                                        <iconify-icon icon="solar:eye-closed-broken" width="1.2em" height="1.2em"
                                            class="d-none" id="hide-icon"></iconify-icon>
                                    </button>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select name="role" class="form-select">
                                        <option value="admin" selected>Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary fw-semibold">Tambah Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-3">Tambah Kata Sandi</h6>
                    <p class="card-subtitle mb-4">Silahkan tambah kata sandi anda disini.</p>
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="">

                        <div class="mb-3">
                            <label class="form-label">Kata Sandi Lama</label>
                            <input type="password" class="form-control" name="old_password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kata Sandi Baru</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ulang Kata Sandi Baru</label>
                            <input type="password" class="form-control" name="repeat_new_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
                    </form>
                </div>
            </div>
        </div> --}}
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
