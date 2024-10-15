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
                    <div class="row">
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb">
                                <h4>Data Pasien</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
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
                    <div class="table-responsive">
                        <table id="dataPasienTable" class="table align-te">
                            <thead>
                                <tr>
                                    <th class="text-dark text-start">No</th>
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
                                        <td class="text-dark text-start text-capitalize">{{ $item->nm_lengkap }}</td>
                                        <td class="text-dark text-start">
                                            @if ($item->tgl_lahir)
                                                {{ Carbon\Carbon::parse($item->tgl_lahir)->translatedFormat('d F Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type="button"
                                                    class="btn btn-sm btn-info d-flex align-items-center py-2"
                                                    data-bs-toggle="modal" data-bs-target="#viewPasien"
                                                    onclick="showPasien({{ $item->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                                        viewBox="0 0 24 24">
                                                        <g fill="none" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round"
                                                                d="M9 4.46A9.8 9.8 0 0 1 12 4c4.182 0 7.028 2.5 8.725 4.704C21.575 9.81 22 10.361 22 12c0 1.64-.425 2.191-1.275 3.296C19.028 17.5 16.182 20 12 20s-7.028-2.5-8.725-4.704C2.425 14.192 2 13.639 2 12c0-1.64.425-2.191 1.275-3.296A14.5 14.5 0 0 1 5 6.821" />
                                                            <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0Z" />
                                                        </g>
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-sm btn-success d-flex align-items-center mx-1 py-2"
                                                    data-bs-toggle="modal" data-bs-target="#viewPasien"
                                                    onclick="editPasien({{ $item->id }})">
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
                                                </button>
                                                <button type="button"
                                                    class="btn btn-sm btn-danger d-flex align-items-center py-2"
                                                    data-bs-toggle="modal" data-bs-target="#deletePasien"
                                                    onclick="deletePasien({{ $item->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2.2"
                                                            d="M20.5 6h-17m5.67-2a3.001 3.001 0 0 1 5.66 0m3.544 11.4c-.177 2.654-.266 3.981-1.131 4.79s-2.195.81-4.856.81h-.774c-2.66 0-3.99 0-4.856-.81c-.865-.809-.953-2.136-1.13-4.79l-.46-6.9m13.666 0l-.2 3" />
                                                    </svg>
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

    {{-- Modal Delete Brands --}}
    <div class="modal fade" tabindex="-1" id="deletePasien" tabindex="-1" aria-labelledby="deletePasienLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content modal-filled bg-dark">
                <form action="{{ route('be.pasien.act_delete') }}" method="post">
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
        $('#dataPasienTable').DataTable({
            "pageLength": 25
        });
    </script>

    <script>
        function showPasien(id) {
            window.location.replace("{{ route('be.pasien.show') }}" + "/" + btoa(id));
        }

        function editPasien(id) {
            window.location.replace("{{ route('be.pasien.edit') }}" + "/" + btoa(id));
        }

        function deletePasien(id) {
            $('#del-user_id').val(id);
        }
    </script>
@endpush
