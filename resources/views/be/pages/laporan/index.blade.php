@extends('be.layouts.app_main')
@push('meta-seo')
    <title>Laporan Hasil Pemeriksaan Perbulan - Posbindu</title>
    <meta content="Halaman Laporan Hasil Pemeriksaan Perbulan Posbindu" name="description">
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
                                <h4>Laporan Hasil Pemeriksaan Perbulan</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Laporan Hasil Pemeriksaan
                                        Perbulan</li>
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
                    <div class="table-responsive border rounded-1">
                        <table id="dataPasienTable" class="table mb-0">
                            <thead class="table-info">
                                <tr align="center">
                                    <th class="text-dark text-start" style="vertical-align: middle;">Bulan</th>
                                    <th class="text-dark">Penderita Hipertensi</th>
                                    <th class="text-dark">Penderita Gula Darah Rendah</th>
                                    <th class="text-dark">Penderita Gula Darah Tinggi</th>
                                    <th class="text-dark">Penderita Asam Urat</th>
                                    <th class="text-dark">Penderita Kolesterol</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr align="center">
                                        <td class="text-dark text-start">{{ $item['bulan'] }}</td>
                                        <td class="text-dark">
                                            @if ($item['hipertensi'] > 0)
                                                <span class="badge bg-danger-subtle text-danger">
                                                    {{ $item['hipertensi'] }}
                                                </span>
                                            @else
                                                {{ $item['hipertensi'] }}
                                            @endif
                                        </td>
                                        <td class="text-dark">
                                            @if ($item['gdr'] > 0)
                                                <span class="badge bg-info-subtle text-info">
                                                    {{ $item['gdr'] }}
                                                </span>
                                            @else
                                                {{ $item['gdr'] }}
                                            @endif
                                        </td>
                                        <td class="text-dark">
                                            @if ($item['gdt'] > 0)
                                                <span class="badge bg-secondary-subtle text-secondary">
                                                    {{ $item['gdt'] }}
                                                </span>
                                            @else
                                                {{ $item['gdt'] }}
                                            @endif
                                        </td>
                                        <td class="text-dark">
                                            @if ($item['asam_urat'] > 0)
                                                <span class="badge bg-primary-subtle text-primary">
                                                    {{ $item['asam_urat'] }}
                                                </span>
                                            @else
                                                {{ $item['asam_urat'] }}
                                            @endif
                                        </td>
                                        <td class="text-dark">
                                            @if ($item['kolesterol'] > 0)
                                                <span class="badge bg-success-subtle text-success">
                                                    {{ $item['kolesterol'] }}
                                                </span>
                                            @else
                                                {{ $item['kolesterol'] }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @foreach ($arrMonth as $item)
                                    <tr align="center">
                                        <td class="text-dark">{{ $item['value'] }}</td>
                                        <td class="text-dark">2</td>
                                        <td class="text-dark">2</td>
                                        <td class="text-dark">2</td>
                                        <td class="text-dark">2</td>
                                        <td class="text-dark">2</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/be/js/datatables.min.js') }}"></script>
@endpush
