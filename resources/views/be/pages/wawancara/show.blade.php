@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Data Wawancara Pasien - Posbindu</title>
    <meta content="Halaman Data Wawancara Pasien Posbindu" name="description">
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
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb">
                                <h4>Data Wawancara</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('be.wawancara.list') }}">Data
                                            Wawancara</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $getUser->nm_lengkap }}</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 text-start text-md-end">
                            <a href="{{ route('be.wawancara.list') }}" class="btn btn-dark fw-semibold">Kembali</a>
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
                    <h6 class="fw-semibold">NIK : <span class="fw-normal">{{ $getUser->nik }}</span></h6>
                    <h6 class="fw-semibold">Nama : <span class="fw-normal">{{ $getUser->nm_lengkap }}</span></h6>
                    <h6 class="fw-semibold">Tanggal Lahir :
                        <span
                            class="fw-normal">{{ Carbon\Carbon::parse($getUser->tgl_lahir)->translatedFormat('d F Y') }}</span>
                    </h6>
                    <h6 class="my-3">Menampilkan <strong>{{ $wawancaraAmount }}</strong> data Wawancara.</h6>
                    <div class="row">
                        {{-- @for ($x = 1; $x <= 4; $x++) --}}
                        @forelse ($getWawancara as $item)
                            <div class="col-lg-6">
                                <div class="card w-100 border">
                                    <div class="card-body">
                                        {{-- <p class="card-subtitle mb-4">Silakan isi data diri anda dengan benar.</p> --}}
                                        <dl class="row text-dark">
                                            <dt class="col-sm-7">Tanggal Input</dt>
                                            <dd class="col-sm-5 fw-bolder">
                                                {{ Carbon\Carbon::parse($item->tgl_input)->translatedFormat('d F Y') }}
                                            </dd>

                                            <h6 class="fw-semibold text-muted mt-2 fs-4">Asesmen Faktor Resiko</h6>

                                            <dt class="col-sm-8">Riwayat Sakit Keluarga</dt>
                                            <dd class="col-sm-42 text-capitalize">
                                                {{ $item->r_sakit_kel }}
                                            </dd>

                                            <dt class="col-sm-8">Riwayat PTM Diri Sendiri</dt>
                                            <dd class="col-sm-42 text-capitalize">
                                                {{ $item->r_sakit_man }}
                                            </dd>

                                            <dt class="col-sm-8">Status Kesehatan Anda Dalam Satu Tahun Terakhir</dt>
                                            <dd class="col-sm-42 text-capitalize">
                                                {{ $item->stat_kes_bln_ter }}
                                            </dd>

                                            <dt class="col-sm-8">Status Kesehatan Anda Saat Ini</dt>
                                            <dd class="col-sm-42 text-capitalize">
                                                {{ $item->stat_kes_bln_skrg }}
                                            </dd>

                                            <h6 class="fw-semibold text-muted mt-2 fs-4">Asesmen Pola Hidup Sehat</h6>

                                            <dt class="col-sm-8">Melakukan Aktivitas Fisik Selama 30 Menit Setiap Hari</dt>
                                            <dd class="col-sm-4 text-capitalize">
                                                {{ $item->aktivitas_fisik }}
                                            </dd>

                                            <dt class="col-sm-8">Mengkonsumsi Sayur dan Buah Setiap Hari</dt>
                                            <dd class="col-sm-4 text-capitalize">
                                                {{ $item->kons_sayur_buah }}
                                            </dd>

                                            <dt class="col-sm-8">Pernah Merokok</dt>
                                            <dd class="col-sm-4 text-capitalize">
                                                {{ $item->merokok }}
                                            </dd>

                                            <dt class="col-sm-8">Pernah Mengkonsumsi Alkohol</dt>
                                            <dd class="col-sm-4 text-capitalize">
                                                {{ $item->alkohol }}
                                            </dd>
                                        </dl>
                                        <div class="d-flex">
                                            <button
                                                class="btn btn-sm btn-success fw-semibold d-flex align-items-center py-2 me-1"
                                                onclick="edtData({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                                    viewBox="0 0 24 24">
                                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="2">
                                                        <path
                                                            d="M2 12c0 4.714 0 7.071 1.464 8.535C4.93 22 7.286 22 12 22s7.071 0 8.535-1.465C22 19.072 22 16.714 22 12v-1.5M13.5 2H12C7.286 2 4.929 2 3.464 3.464c-.973.974-1.3 2.343-1.409 4.536" />
                                                        <path
                                                            d="m16.652 3.455l.649-.649A2.753 2.753 0 0 1 21.194 6.7l-.65.649m-3.892-3.893s.081 1.379 1.298 2.595c1.216 1.217 2.595 1.298 2.595 1.298m-3.893-3.893L10.687 9.42c-.404.404-.606.606-.78.829q-.308.395-.524.848c-.121.255-.211.526-.392 1.068L8.412 13.9m12.133-6.552l-2.983 2.982m-2.982 2.983c-.404.404-.606.606-.829.78a4.6 4.6 0 0 1-.848.524c-.255.121-.526.211-1.068.392l-1.735.579m0 0l-1.123.374a.742.742 0 0 1-.939-.94l.374-1.122m1.688 1.688L8.412 13.9" />
                                                    </g>
                                                </svg>
                                                <span class="ms-1">Ubah</span>
                                            </button>
                                            <button class="btn btn-sm btn-danger fw-semibold d-flex align-items-center py-2"
                                                data-bs-toggle="modal" data-bs-target="#delWawancara"
                                                onclick="delData({{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                                    viewBox="0 0 24 24">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="2"
                                                        d="M20.5 6h-17m5.67-2a3.001 3.001 0 0 1 5.66 0m3.544 11.4c-.177 2.654-.266 3.981-1.131 4.79s-2.195.81-4.856.81h-.774c-2.66 0-3.99 0-4.856-.81c-.865-.809-.953-2.136-1.13-4.79l-.46-6.9m13.666 0l-.2 3" />
                                                </svg>
                                                <span class="ms-1">Hapus</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h6 class="fw-semibold text-center">Belum ada Wawancara</h6>
                        @endforelse
                        {{-- @endfor --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Delete --}}
    <div class="modal fade" tabindex="-1" id="delWawancara" tabindex="-1" aria-labelledby="delWawancaraLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content modal-filled bg-dark">
                <form action="{{ route('be.wawancara.act_delete') }}" method="post">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <h4 class="fw-medium text-white mt-2">Apakah anda yakin?</h4>
                            <p class="mt-3">Data yang sudah dihapus tidak dapat dipulihkan!</p>
                            <input type="hidden" id="del-wawancara_id" name="wawancara_id" value="">
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
        function edtData(id) {
            window.location.replace("{{ route('be.wawancara.edit') }}" + "/" + btoa(id));
        }

        function delData(id) {
            $('#del-wawancara_id').val(id);
        }
    </script>
@endpush
