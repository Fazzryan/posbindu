@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Pemeriksaan - Posbindu</title>
    <meta content="Halaman Pemeriksaan Posbindu" name="description">
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
                                <h4>Data Pemeriksaan</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Pemeriksaan</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 text-start text-md-end">
                            <a href="{{ route('be.pemeriksaan.add') }}" class="btn btn-primary fw-semibold">Tambah
                                Pemeriksaan</a>
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
                    <div class="table-responsive">
                        <table id="dataPemeriksaanTable" class="table align-te">
                            <thead>
                                <tr>
                                    <th class="text-dark    text-start">No</th>
                                    <th class="text-dark text-start">NIK</th>
                                    <th class="text-dark text-start">Nama Pasien</th>
                                    <th class="text-dark text-start">Tanggal Lahir</th>
                                    <th class="text-dark">
                                        <div class="d-flex align-items-center">
                                            <iconify-icon icon="solar:settings-broken" width="1.2em"
                                                height="1.2em"></iconify-icon>
                                            <span class="ms-1">Action</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getPasien as $key => $item)
                                    <tr>
                                        <td class="text-dark text-start">{{ $key + 1 }}</td>
                                        <td class="text-dark text-start">{{ $item->nik }}</td>
                                        <td class="text-dark text-start">{{ $item->nm_lengkap }}</td>
                                        <td class="text-dark text-start">
                                            {{ Carbon\Carbon::parse($item->tgl_lahir)->translatedFormat('d F Y') }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type="button"
                                                    class="btn btn-sm btn-info fw-semibold d-flex align-items-center py-2"
                                                    onclick="showPemeriksaan({{ $item->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                                        viewBox="0 0 24 24">
                                                        <g fill="none" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round"
                                                                d="M9 4.46A9.8 9.8 0 0 1 12 4c4.182 0 7.028 2.5 8.725 4.704C21.575 9.81 22 10.361 22 12c0 1.64-.425 2.191-1.275 3.296C19.028 17.5 16.182 20 12 20s-7.028-2.5-8.725-4.704C2.425 14.192 2 13.639 2 12c0-1.64.425-2.191 1.275-3.296A14.5 14.5 0 0 1 5 6.821" />
                                                            <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0Z" />
                                                        </g>
                                                    </svg>
                                                    <span class="ms-1">Lihat Data</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete --}}
    <div class="modal fade" tabindex="-1" id="deletePemeriksaan" tabindex="-1" aria-labelledby="deletePemeriksaanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content modal-filled bg-dark">
                <form action="" method="post">
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
    <script src="{{ asset('assets/be/js/datatables.min.js') }}"></script>

    <script>
        $('#dataPemeriksaanTable').DataTable();
    </script>
    <script>
        function showPemeriksaan(id) {
            window.location.replace("{{ route('be.pemeriksaan.show') }}" + "/" + btoa(id));
        }
    </script>
@endpush
