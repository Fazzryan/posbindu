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
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb">
                                <h4>Data Petugas</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Petugas</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('be.profile.add') }}" class="btn btn-primary fw-semibold">Tambah Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
@section('content')
    <div class="row">
        {{-- @forelse ($getProfile as $item) --}}
        {{-- <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center">
                        <div
                            class="border border-3 border-outline d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                            <img src="{{ asset('assets/be/images/profile/user-1.jpg') }}" alt="profile" width="100">
                        </div>
                    </div>
                    <h5 class="card-title mt-2">Dinda Fazryan</h5>
                    <span class="text-uppercase badge bg-danger-subtle text-danger">Petugas</span>
                    <h6 class="fw-semibold text-uppercase mt-2">Pos Binaan Terpadu</h6>
                    <a href="#" class="btn btn-primary btn-sm px-3">
                        Lihat
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 12h2.5M20 12l-6-6m6 6l-6 6m6-6H9.5" />
                        </svg>
                    </a>
                </div>
            </div>
        </div> --}}
        <div class="col-12">
            @include('be.layouts.app_session')
        </div>
        @foreach ($getProfile as $item)
            <div class="col-md-6 col-lg-4 g-3">
                <div class="card border h-100 mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 col-lg-12 col-xl-5">
                                <div class="d-flex justify-content-center">
                                    <div
                                        class="border border-3 border-outline d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                                        <img src="{{ asset('assets/be/images/profile/' . '/' . $item->gambar) }}"
                                            alt="profile" width="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-12 col-xl-7 text-center text-xl-start">
                                <h5 class="card-title mt-2 text-capitalize">{{ $item->nm_lengkap }}</h5>
                                @if ($item->user_role == 'admin')
                                    <span
                                        class="text-uppercase badge bg-danger-subtle text-danger">{{ $item->user_role }}</span>
                                @else
                                    <span
                                        class="text-uppercase badge bg-success-subtle text-success">{{ $item->user_role }}</span>
                                @endif
                                <h6 class="fw-semibold text-uppercase mt-2">Pos Binaan Terpadu</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a onclick="showDetail({{ $item->id }})" class="cursor-pointer">
                                        Lihat Profile
                                    </a>
                                    <button type="button" onclick="deleteProfile({{ $item->id }})"
                                        data-bs-toggle="modal" data-bs-target="#deleteProfile"
                                        class="btn btn-sm btn-light border d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-width="2"
                                                d="M9.17 4a3.001 3.001 0 0 1 5.66 0m5.67 2h-17m14.874 9.4c-.177 2.654-.266 3.981-1.131 4.79s-2.195.81-4.856.81h-.774c-2.66 0-3.99 0-4.856-.81c-.865-.809-.953-2.136-1.13-4.79l-.46-6.9m13.666 0l-.2 3M9.5 11l.5 5m4.5-5l-.5 5" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Modal Delete Profile --}}
    <div class="modal fade" tabindex="-1" id="deleteProfile" tabindex="-1" aria-labelledby="deleteProfileLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content modal-filled bg-dark">
                <form action="{{ route('be.profile.delete') }}" method="post">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <h4 class="fw-medium text-white mt-2">Apakah anda yakin?</h4>
                            <p class="mt-3">Data yang sudah dihapus tidak dapat dipulihkan!</p>
                            <input type="hidden" id="del-user_id" name="user_id" value="">
                            <button type="button" class="btn btn-light rounded-6 my-2"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger rounded-6 my-2 ms-1"
                                data-bs-dismiss="modal">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function showDetail(id) {
            window.location.replace("{{ route('be.profile.detail') }}" + "/" + btoa(id));
        }

        function deleteProfile(id) {
            $("#del-user_id").val(id);
        }
    </script>
@endpush
