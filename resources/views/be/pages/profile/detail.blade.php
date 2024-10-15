@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Profile - Posbindu</title>
    <meta content="Halaman Profile Posbindu" name="description">
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
                                <h4>Profile</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('be.profile.list') }}">Profile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-5 text-end">
                            <a href="{{ route('be.profile.list') }}" class="btn btn-dark">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-8">
            <div class="card">
                <div class="card-body">
                    @include('be.layouts.app_session')
                    <h6 class="card-title">Data Diri</h6>
                    <p class="card-subtitle mb-4">Silahkan ubah data diri anda disini.</p>
                    <div class="mb-3">
                        <div class="d-flex justify-content-center">
                            <div
                                class="border border-3 border-outline d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                                @if (!$getProfileDetail)
                                    <img src="{{ asset('assets/be/images/profile/user-3.jpg') }}" alt="profile"
                                        style="object-fit: cover" width="120" height="120">
                                @else
                                    <img src="{{ asset('assets/be/images/profile/' . '/' . $getProfileDetail->gambar) }}"
                                        alt="profile" style="object-fit: cover" width="120" height="120">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control text-capitalize"
                                    value="{{ $getProfileDetail->nm_lengkap }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $getProfileDetail->email }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="number" class="form-control" value="{{ $getProfileDetail->no_hp }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control text-capitalize"
                                    value="{{ $getProfileDetail->jenis_kelamin == 'perempuan' ? 'Perempuan' : 'Laki-Laki' }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfile"
                        onclick="editProfile({{ $getProfileDetail->id }})">Ubah
                        Profile</button>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-3">Ubah Kata Sandi</h6>
                    <p class="card-subtitle mb-4">Silahkan ubah kata sandi anda disini.</p>
                    <form action="{{ route('be.profile.act_edit_autentikasi') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $getProfileDetail->id }}">

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
        </div>
    </div>

    {{-- Modal Edit profile --}}
    <div class="modal fade" tabindex="-1" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title text-dark">Edit profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('be.profile.act_edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="edt-user_id" name="user_id" value="">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control text-capitalize" id="edt-nm_lengkap"
                                name="nm_lengkap">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="edt-email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="number" class="form-control" id="edt-no_hp" name="no_hp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select id="edt-jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <option value="laki_laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="add-gambar" class="form-label">Gambar Baru</label>

                            <input type="file" id="edt-gambar" name="gambar" class="form-control" accept="image/*"
                                onchange="gantiGambar()">

                            <input type="hidden" id="edt-file_gambar" name="file_gambar" value="">
                        </div>
                        <img id="edt-img_gambar" src="" width="90" class="rounded" loading="lazy" />
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function gantiGambar() {
            $("#edt-file_gambar").val("gantiGambar");
        }

        function editProfile(id) {
            if (id == "{{ $getProfileDetail->id }}") {
                $("#edt-user_id ").val("{{ $getProfileDetail->id }}");
                $("#edt-nm_lengkap ").val("{{ $getProfileDetail->nm_lengkap }}");
                $("#edt-email").val("{{ $getProfileDetail->email }}");
                $("#edt-no_hp").val("{{ $getProfileDetail->no_hp }}");
                $("#edt-jenis_kelamin").val("{{ $getProfileDetail->jenis_kelamin }}");
                $("#edt-img_gambar").attr("src",
                    "{{ asset('assets/be/images/profile/') . '/' . $getProfileDetail->gambar }}");
            }
        }
    </script>
@endpush
