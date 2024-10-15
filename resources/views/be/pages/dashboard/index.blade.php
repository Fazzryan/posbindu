@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Dashboard - Posbindu</title>
    <meta content="Halaman Dashboard Posbindu" name="description">
    <meta content="Dinda Fazryan" name="author">
    <meta content="Posbindu" name="keywords">
@endpush
@push('custom-css')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden primary-gradient">
                <div class="card-body py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-6">
                            <h4 class="fw-semibold mb-3">Selamat Datang di POSBINDU PTM! Lansia Bahagia Bersama
                                Keluarga</h4>
                            <p>
                                Posbindu hadir untuk mengedukasi masyarakat dan mengumpulkan data penting terkait penyakit
                                tidak menular. Kami berkomitmen membantu dalam pencegahan dan penanganan penyakit tidak
                                menular.
                            </p>
                            {{-- <button class="btn btn-info">Download</button> --}}
                        </div>
                        <div class="col-sm-5">
                            <div class="position-relative mb-n5 text-center">
                                <img src="{{ asset('assets/fe/images/background/track-bg.png') }}" alt="matdash-img"
                                    class="img-fluid" width="180" height="230">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="card border-bottom border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-danger display-6">
                            <iconify-icon icon="solar:shield-user-broken" width="1.2em" height="1.2em"></iconify-icon>
                        </span>
                        <div>
                            <h2 class="fs-7">{{ $totPetugas }}</h2>
                            <p class="fw-medium text-danger mb-0">
                                Petugas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="card border-bottom border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-primary display-6">
                            <iconify-icon icon="solar:users-group-two-rounded-broken" width="1.2em"
                                height="1.2em"></iconify-icon>
                        </span>
                        <div>
                            <h2 class="fs-7">{{ $totPasien }}</h2>
                            <p class="fw-medium text-primary mb-0">
                                Pasien</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="card border-bottom border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-info display-6">
                            <iconify-icon icon="solar:book-2-broken" width="1.2em" height="1.2em"></iconify-icon>
                        </span>
                        <div>
                            <h2 class="fs-7">{{ $totWawancara }}</h2>
                            <p class="fw-medium text-info mb-0">
                                Wawancara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="card border-bottom border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-success display-6">
                            <iconify-icon icon="solar:stethoscope-broken" width="1.2em" height="1.2em"></iconify-icon>
                        </span>
                        <div>
                            <h2 class="fs-7">{{ $totPemeriksaan }}</h2>
                            <p class="fw-medium text-success mb-0">
                                Pemeriksaan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="card border-bottom border-dark">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-dark display-6">
                            <iconify-icon icon="solar:history-broken" width="1.2em" height="1.2em"></iconify-icon>
                        </span>
                        <div>
                            <h2 class="fs-7">{{ $totRiwayat }}</h2>
                            <p class="fw-medium text-dark mb-0">
                                Riwayat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
