@extends('fe.layouts.app_main')
@push('meta-seo')
    <title>Beranda - Posbindu</title>
    <meta content="Halaman Beranda Posbindu" name="description">
    <meta content="Dinda Fazryan" name="author">
    <meta content="Posbindu" name="keywords">
@endpush
@push('custom-css')
@endpush
@section('content')
    <div class="row align-items-center mb-3">
        <div class="col-md-6">
            <div class="text-center text-md-start">
                <h1 class="fw-bolder text-uppercase">Selamat Datang di Posbindu</h1>
                <h4 class="fw-semibold text-capitalize">Pos Binaan Terpadu penyakit tidak menular</h4>
                <p class="mt-3">Posbindu hadir untuk mengedukasi masyarakat dan mengumpulkan data penting terkait penyakit
                    tidak menular. Melalui fitur pemeriksaan pasien, pengelolaan data diri, serta diagnosis penyakit, kami
                    berkomitmen membantu dalam pencegahan dan penanganan penyakit tidak menular.</p>
                <p>Sebelum melanjutkan, harap lengkapi identitas diri Anda terlebih dahulu agar kami dapat memberikan
                    layanan yang lebih sesuai dengan kebutuhan kesehatan Anda.</p>
                @if (Session::has('login'))
                @else
                    <a href="{{ route('auth.register') }}" class="btn btn-primary fw-semibold">Daftar Sekarang</a>
                @endif
            </div>
        </div>
        <div class="col-md-6 d-none d-md-block">
            <div class="text-center">
                <img src="{{ asset('assets/fe/images/background/banner2.jpg') }}" class="w-100" alt="banner">
            </div>
        </div>
    </div>

    {{-- section tentang --}}
    <div class="row mt-5">
        <div class="col-md-12 mb-4">
            <h4 class="text-center fw-bolder">Tentang Posbindu</h4>
        </div>

        <div class="col-lg-4">
            <h5 class="fw-bolder" style="font-size: 1rem;">Sejarah Posbindu</h5>
            <p>Posbindu (Pos Binaan Terpadu) lahir sebagai upaya pencegahan dan pengendalian penyakit tidak menular (PTM) di
                masyarakat. Didirikan sebagai inisiatif kolaboratif antara tenaga kesehatan dan masyarakat, Posbindu
                bertujuan untuk meningkatkan kesadaran publik akan pentingnya deteksi dini serta pengelolaan risiko PTM
                melalui edukasi dan pemeriksaan kesehatan rutin. Sejak didirikan, Posbindu telah membantu ribuan individu
                dalam memantau kesehatan mereka secara berkala.</p>
        </div>
        <div class="col-lg-4">

            <h5 class="fw-bolder" style="font-size: 1rem;">Visi Dan Misi</h5>
            <p class="mb-1">Visi Posbindu adalah menciptakan masyarakat yang sehat dan sadar akan pentingnya pencegahan
                penyakit tidak
                menular melalui pemeriksaan rutin dan edukasi kesehatan. Misi kami meliputi:
            </p>

            <ol>
                <li>Menyediakan akses mudah bagi masyarakat untuk pemeriksaan kesehatan terkait PTM.</li>
                <li>Mengedukasi masyarakat mengenai gaya hidup sehat dan pencegahan risiko penyakit.</li>
                <li>Mengumpulkan dan menganalisis data kesehatan masyarakat untuk mendukung program kesehatan yang lebih
                    baik.</li>
            </ol>
        </div>
        <div class="col-lg-4">
            <h5 class="fw-bolder" style="font-size: 1rem;">Layanan Kami</h5>
            <p>Posbindu menyediakan berbagai layanan, termasuk pemeriksaan kesehatan rutin seperti pengukuran tekanan darah,
                berat badan, dan kadar gula darah. Kami juga menawarkan edukasi mengenai pola hidup sehat, konseling
                kesehatan, serta hasil diagnosis penyakit tidak menular. Melalui layanan ini, Posbindu berkomitmen membantu
                masyarakat mengelola dan mencegah risiko PTM secara efektif.</p>
        </div>
    </div>

    {{-- section layanan utama --}}
    <div class="row mt-5">
        <div class="col-md-12 mb-4">
            <h4 class="text-center fw-bolder">Tentang Posbindu</h4>
        </div>

        <div class="col-lg-4">
            <h5 class="fw-bolder" style="font-size: 1rem;">Sejarah Posbindu</h5>
            <p>Posbindu (Pos Binaan Terpadu) lahir sebagai upaya pencegahan dan pengendalian penyakit tidak menular (PTM) di
                masyarakat. Didirikan sebagai inisiatif kolaboratif antara tenaga kesehatan dan masyarakat, Posbindu
                bertujuan untuk meningkatkan kesadaran publik akan pentingnya deteksi dini serta pengelolaan risiko PTM
                melalui edukasi dan pemeriksaan kesehatan rutin. Sejak didirikan, Posbindu telah membantu ribuan individu
                dalam memantau kesehatan mereka secara berkala.</p>
        </div>
        <div class="col-lg-4">
            <h5 class="fw-bolder" style="font-size: 1rem;">Visi Dan Misi</h5>
            <p class="mb-1">Visi Posbindu adalah menciptakan masyarakat yang sehat dan sadar akan pentingnya pencegahan
                penyakit tidak
                menular melalui pemeriksaan rutin dan edukasi kesehatan. Misi kami meliputi:
            </p>

            <ol>
                <li>Menyediakan akses mudah bagi masyarakat untuk pemeriksaan kesehatan terkait PTM.</li>
                <li>Mengedukasi masyarakat mengenai gaya hidup sehat dan pencegahan risiko penyakit.</li>
                <li>Mengumpulkan dan menganalisis data kesehatan masyarakat untuk mendukung program kesehatan yang lebih
                    baik.</li>
            </ol>
        </div>
        <div class="col-lg-4">
            <h5 class="fw-bolder" style="font-size: 1rem;">Layanan Kami</h5>
            <p>Posbindu menyediakan berbagai layanan, termasuk pemeriksaan kesehatan rutin seperti pengukuran tekanan darah,
                berat badan, dan kadar gula darah. Kami juga menawarkan edukasi mengenai pola hidup sehat, konseling
                kesehatan, serta hasil diagnosis penyakit tidak menular. Melalui layanan ini, Posbindu berkomitmen membantu
                masyarakat mengelola dan mencegah risiko PTM secara efektif.</p>
        </div>
    </div>

    {{-- section testimoni --}}
    <div class="row mt-5">
        <div class="col-md-12 mb-4">
            <h4 class="text-center fw-bolder">Testimoni</h4>
        </div>
    </div>
    {{-- section galeri --}}
    <div class="row mt-5">
        <div class="col-md-12 mb-4">
            <h4 class="text-center fw-bolder">Galeri</h4>
        </div>
    </div>
    {{-- section tim posbindu --}}
    <div class="row mt-5">
        <div class="col-md-12 mb-4">
            <h4 class="text-center fw-bolder">Tim Posbindu</h4>
        </div>
    </div>
    {{-- section informaso lokaso dan jadwal --}}
@endsection
@push('js')
@endpush
