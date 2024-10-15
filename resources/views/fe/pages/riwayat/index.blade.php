@extends('fe.layouts.app_main')
@push('meta-seo')
    <title>Riwayat - Posbindu</title>
    <meta content="Halaman Riwayat Posbindu" name="description">
    <meta content="Dinda Fazryan" name="author">
    <meta content="Posbindu" name="keywords">
@endpush
@push('custom-css')
@endpush
@section('content')
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="text-center">
                <h1 class="fw-bolder">Riwayat</h1>
                <h4 class="fw-semibold text-capitalize">Pos Binaan Terpadu penyakit tidak menular</h4>
            </div>
        </div>
        <div class="col-md-6 text-center mt-3">
            <p> Anda dapat melihat riwayat pemeriksaan kesehatan dan hasil diagnosis Anda yang tercatat di Posbindu.
                Informasi ini membantu Anda untuk memantau perkembangan kesehatan serta mempersiapkan langkah-langkah
                pencegahan yang tepat sesuai dengan kondisi Anda.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card border">
                <div class="card-body">
                    @include('be.layouts.app_session')
                    <h6 class="fw-semibold">NIK : <span class="fw-normal">{{ $getUser->nik }}</span></h6>
                    <h6 class="fw-semibold">Nama : <span class="fw-normal">{{ $getUser->nm_lengkap }}</span></h6>
                    <h6 class="fw-semibold">Tanggal Lahir :
                        <span
                            class="fw-normal">{{ Carbon\Carbon::parse($getUser->tgl_lahir)->translatedFormat('d F Y') }}</span>
                    </h6>
                    <h6 class="my-3">Menampilkan <strong>{{ $riwayatAmount }}</strong> data riwayat.</h6>
                    <div class="row">
                        @forelse ($getRiwayat as $item)
                            <div class="col-lg-6">
                                <div class="card w-100 border">
                                    <div class="card-body">
                                        {{-- <p class="card-subtitle mb-4">Silakan isi data diri anda dengan benar.</p> --}}
                                        <dl class="row text-dark">
                                            <dt class="col-sm-7">Tanggal Input</dt>
                                            <dd class="col-sm-5 fw-bolder">
                                                {{ Carbon\Carbon::parse($item->tgl_input)->translatedFormat('d F Y') }}
                                            </dd>

                                            <dt class="col-sm-7">Status Kesehatan Satu Bulan Terakhir</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->stat_kes_bln_ter }}
                                            </dd>

                                            <dt class="col-sm-7">Status Kesehatan Bulan Ini</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->stat_kes_bln_skrg }}
                                            </dd>

                                            <h6 class="fw-semibold text-muted mt-2 fs-4">Riwayat Kesehatan</h6>

                                            <dt class="col-sm-7">Riwayat Sakit Keluarga</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->r_sakit_kel }}
                                            </dd>

                                            <dt class="col-sm-7">Riwayat PTM Mandiri</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->bb }}
                                            </dd>
                                            <dt class="col-sm-7">Berat Badan</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->tb }} Kg
                                            </dd>
                                            <dt class="col-sm-7">Tinggi Badan</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->tb }} Cm
                                            </dd>
                                            <dt class="col-sm-7">Gula Darah</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->gula_darah }}
                                            </dd>
                                            <dt class="col-sm-7">Tekanan Darah</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->tekanan_darah }}
                                            </dd>
                                            <dt class="col-sm-7">Asam Urat</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->asam_urat }}
                                            </dd>
                                            <dt class="col-sm-7">Kolesterol</dt>
                                            <dd class="col-sm-5 text-capitalize">
                                                {{ $item->kolesterol }}
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h6 class="fw-semibold text-center">Belum ada riwayat.</h6>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
