@extends('fe.layouts.app_main')
@push('meta-seo')
    <title>Edukasi - Posbindu</title>
    <meta content="Halaman Edukasi Posbindu" name="description">
    <meta content="Dinda Fazryan" name="author">
    <meta content="Posbindu" name="keywords">
@endpush
@push('custom-css')
    <style>
        .card-img-edu {
            width: 100%;
            aspect-ratio: 16/10;
            object-fit: cover;
            border-radius: .6rem;
        }
    </style>
@endpush
@section('content')
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="text-center">
                <h1 class="fw-bolder">Edukasi</h1>
                <h4 class="fw-semibold text-capitalize">Pos Binaan Terpadu penyakit tidak menular</h4>
            </div>
        </div>
        <div class="col-md-6 text-center mt-3">
            <p>Halaman edukasi ini dirancang untuk memberikan informasi lengkap mengenai berbagai penyakit tidak menular
                seperti asam urat, kolesterol, hipertensi, dan penyakit berbahaya lainnya. Pelajari lebih lanjut tentang
                gejala, penyebab, pencegahan, dan cara penanganannya untuk menjaga kesehatan Anda dan keluarga.</p>
        </div>
    </div>

    <div class="row g-3 mb-3">
        {{-- asam urat --}}
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm">
                <div class="text-center">
                    <img src="{{ asset('assets/fe/images/edu/asamurat.jpg') }}" class="card-img-edu" alt="...">
                </div>
                <div class="card-body p-3">
                    <h5 class="card-title">Asam Urat</h5>
                    <p class="card-text">
                        <span class="fw-semibold">Pengertian</span>
                        <br>
                        Asam urat adalah nyeri sendi berat yang disertai kemerahan, bengkak, dan rasa hangat
                        akibat penumpukan kristal asam urat di sendi. Kondisi ini terjadi di jempol kaki, dan menyerang
                        sendi pada jari kaki yang lain, lutut, atau pergelangan kaki.
                    </p>
                    <hr>
                    <p class="card-text">

                        <span class="fw-semibold">Pencegahan</span>
                        <br>
                        1. Berolahraga rutin
                        <br>
                        2. Tidak mengonsumsialkohol
                        <br>
                        3. Menjaga berat badan
                        <br>
                        4. Menghindari makanan kadar purin tinggi
                        <br>
                        5. Minum banyak air membantu ginjal berfungsi lebih baik
                        <br>
                        6. Menghindari penggunaan obat-obatan tertentu
                        <br>
                        {{-- <ul>
                        <li>1. Berolahraga rutin</li>
                        <li>2. Tidak mengonsumsialkohol</li>
                        <li>3. Menjaga berat badan</li>
                        <li>4. Menghindari makanan kadar purin tinggi</li>
                        <li>5. Minum banyak air membantu ginjal berfungsi lebih baik</li>
                        <li>6. Menghindari penggunaan obat-obatan tertentu</li>
                    </ul> --}}
                    </p>

                </div>
            </div>
        </div>

        {{-- kolersterl --}}
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm">
                <div class="text-center">
                    <img src="{{ asset('assets/fe/images/edu/colesterol.jpg') }}" class="card-img-edu" alt="...">
                </div>
                <div class="card-body p-3">
                    <h5 class="card-title">Kolesterol</h5>
                    <p class="card-text">
                        <span class="fw-semibold">Pengertian</span>
                        <br>
                        Kolesterol adalah suatu zat lemak yang diproduksi oleh hati dan sangat diperlukan oleh tubuh.
                        Kolesterol yang berlebihan dalam darah akan menimbulkan masalah terutama pada pembuluh darah jantung
                        dan otak.
                    </p>
                    <hr>
                    <p class="card-text">
                        <span class="fw-semibold">Pencegahan</span>
                        <br>
                        1. Menerapkan pola makan sehat. Perbanyak makan sayur, buah-buahan, dan ikan
                        <br>
                        2. Menurunkan berat badan berlebih
                        <br>
                        3. Berolahraga secara teratur
                        <br>
                        4. Menghentikan kebiasaan merokok
                    </p>
                </div>
            </div>
        </div>

        {{-- hipertensi --}}
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm">
                <div class="text-center">
                    <img src="{{ asset('assets/fe/images/edu/tensi.jpg') }}" class="card-img-edu" alt="...">
                </div>
                <div class="card-body p-3">
                    <h5 class="card-title">Hipertensi</h5>
                    <p class="card-text">
                        <span class="fw-semibold">Pengertian</span>
                        <br>
                        Hipertensi adalah kondisi ketika tekanan darah pada dinding arteri (pembuluh darah bersih) meningkat
                        cukup tinggi. Bila keadaan ini berlangsung secara terus-menerus, maka dapat meningkatkan resiko
                        penyakit jantung dan stroke.
                    </p>
                    <hr>
                    <p class="card-text">
                        <span class="fw-semibold">Pencegahan</span>
                        <br>
                        1. Mengurangi konsumsi garam
                        <br>
                        2. Rutin berolahraga
                        <br>
                        3. Relaksasi untuk meredkan stres
                        <br>
                        4. Menjaga berat badan agar tetap normal
                        <br>
                        5. Membatasi konsumsi kafein
                        <br>
                        6. Melakukan pemeriksaan secara rutin
                    </p>
                </div>
            </div>
        </div>

        {{-- gula darah rendah --}}
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm">
                <div class="text-center">
                    <img src="{{ asset('assets/fe/images/edu/gdr.jpg') }}" class="card-img-edu" alt="...">
                </div>
                <div class="card-body p-3">
                    <h5 class="card-title">Gula Darah Rendah</h5>
                    <p class="card-text">
                        <span class="fw-semibold">Pengertian</span>
                        <br>
                        Gula darah rendah, atau disebut juga hipoglikemia, adalah kondisi di mana kadar gula (glukosa) dalam
                        darah berada di bawah batas normal. Glukosa adalah sumber energi utama bagi tubuh, terutama otak.
                        Jika kadar gula darah terlalu rendah, tubuh tidak memiliki cukup energi untuk berfungsi dengan baik.
                        Gejala gula darah rendah bisa termasuk pusing, lemas, berkeringat, gemetar, bingung, atau bahkan
                        pingsan.
                    </p>
                    <hr>
                    <p class="card-text">
                        <span class="fw-semibold">Pencegahan</span>
                        <br>
                        1. Jangan melewatkan waktu makan, terutama sarapan. Pastikan makan makanan yang seimbang.
                        <br>
                        2. Jika Anda cenderung mengalami gula darah rendah, bawalah camilan sehat seperti buah,
                        kacang-kacangan,
                        atau biskuit gandum utuh.
                        <br>
                        3. Jika Anda menggunakan obat atau insulin untuk diabetes, pastikan dosisnya sesuai dengan kebutuhan
                        tubuh
                        Anda.
                        <br>
                        4. Bagi penderita diabetes, memantau kadar gula darah secara rutin sangat penting. Untuk membantu
                        mengetahui kapan kadar gula darah turun dan mengambil tindakan pencegahan yang tepat.
                    </p>
                </div>
            </div>
        </div>

        {{-- gula darah tinggi --}}
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border shadow-sm">
                <div class="text-center">
                    <img src="{{ asset('assets/fe/images/edu/gdt.jpg') }}" class="card-img-edu" alt="...">
                </div>
                <div class="card-body p-3">
                    <h5 class="card-title">Gula Darah Tinggi</h5>
                    <p class="card-text">
                        <span class="fw-semibold">Pengertian</span>
                        <br>
                        Gula darah tinggi, atau disebut juga hiperglikemia, adalah kondisi di mana kadar gula (glukosa)
                        dalam darah berada di atas batas normal. Hiperglikemia biasanya terjadi pada orang yang mengidap
                        diabetes, terutama jika mereka tidak mengelola kondisi tersebut dengan baik, seperti mengonsumsi
                        terlalu banyak makanan manis atau tidak cukup berolahraga.
                    </p>
                    <hr>
                    <p class="card-text">
                        <span class="fw-semibold">Pencegahan</span>
                        <br>
                        1. Pilih makanan yang rendah gula dan tinggi serat, seperti sayuran, buah-buahan, biji-bijian, dan
                        protein tanpa lemak.
                        <br>
                        2. Makan dalam porsi yang sesuai dan hindari makan berlebihan
                        <br>
                        3. Lakukan aktivitas fisik secara teratur, seperti berjalan kaki, bersepeda, atau berenang
                        <br>
                        4.Periksa kadar gula darah secara rutin sesuai anjuran dokter.
                        <br>
                        5.Jika Anda diberi obat oleh dokter untuk mengontrol gula darah, pastikan untuk mengonsumsinya
                        sesuai
                        dengan petunjuk.
                        <br>
                        6. Teknik relaksasi seperti meditasi, pernapasan dalam, atau yoga untuk mengelola stres.
                    </p>
                </div>
            </div>
        </div>
        {{-- @for ($i = 0; $i <= 4; $i++)
            <div class="col-md-6 col-lg-3">
                <div class="card border shadow-sm">
                    <img src="{{ asset('assets/fe/images/edu/colesterol.jpg') }}" class="card-img-edu"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="">Lihat</a>
                    </div>
                </div>
            </div>
        @endfor --}}
    </div>
@endsection
@push('js')
@endpush
