@extends('layouts.master_front')
@section('title', 'BMTI - Galeri Kejuruan')
@section('custom-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
<script src="https://kit.fontawesome.com/b31e06099e.js" crossorigin="anonymous"></script>

<style>
.author-text {
    background: url(https://annedece.sirv.com/Images/commo.png) no-repeat right bottom;
}

.owl-prev,
.owl-next {
    width: 15px;
    height: 15px;
    position: absolute;
    top: 41%;
    display: block !important;
}

.owl-prev {
    left: 0px;
}

.owl-next {
    right: 18px;
}

.owl-prev i,
.owl-next i {
    color: #14395B;
    background-color: #3901f8;
    padding: 15px;
}

button {
    border: none !important;
    border-radius: none !important;
    outline: none !important;
}

@media (max-width: 800px) {
    .author-text {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .lead {
        font-size: 16px;
    }
}
</style>
@endsection
@section('content')
<div class="beranda">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-11 col-xl-12 text-welcome order-1">
                <h6>BBPPMPV BIDANG MESIN DAN TEKNIK INDUSTRI</h6>
                <h1>Selamat Datang</h1>
                <h2>Sahabat Cerdas BMTI</h2>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-12 col-lg-6 col-xl-7 text-welcome mt-0 order-3 order-lg-2 order-xl-2">
                <p>Pelatihan Mandiri adalah fasilitas bagi guru kejuruan agar dapat mengikuti pelatihan secara mandiri
                    sesuai kompetensinya atau sesuai peminatannya.</p>
                <p>Galeri Kejuruan adalah “Perwujudan Gagasan lewat Materi Kejuruan”, merupakan pusat atau sumber
                    belajar yang bermuara pada wahana peningkatan kompetensi guru kejuruan di berbagai Kompetensi
                    Keahlian.</p>
                <p>Galeri Kejuruan diinisiasi oleh BBPPMPV BMTI untuk memerdekakan Guru dan Siswa dalam Pembelajaran
                    berbasis Kompetensi yang dapat diakses secara virtual, kapan dan dimana saja.</p>
            </div>

            <div class="col-12 col-lg-5 col-xl-5 order-2">
                <div class="img-welcome text-center">
                    <img src="{{asset('guest/assets/images/salam.png')}}" height="420px" width="380px" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="col-5 col-lg-3 col-xl-3 logo-kemdikbud-beranda float-start mt-3">
                    <img src="{{asset('guest/assets/images/logo-kemdikbud.png')}}" width="70px" height="70px" />
                    <p class="col-6">Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi</p>
                </div>
                <div class="col-5 col-lg-8 col-xl-9 logo-bmti-beranda float-end mt-3">
                    <img src="{{asset('guest/assets/images/logo-bmti.png')}}" width="70px" height="70px" />
                    <p class="col-6">BBPPMPV <br /> Bidang Mesin dan Teknik Industri</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row float-end">
        <div class="col-12 col-lg-6 col-xl-6 mt-0 order-1 order-sm-2 mt-5">
            <div class="pel-mandiri">
                <h1>Pelatihan Mandiri</h1>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6 order-3 margin-pel-mandiri">
            <div class="pel-mandiri">
                <p>Pada Portal Pelatihan Mandiri – Pelatihan Mandiri adalah fasilitas yang diberikan kepada guru untuk
                    melakukan latihan kompetensi keahlian sesuai pilihannya, yang dilaksanakan secara mandiri. Pelatihan
                    mandiri merupakan bagian dari galeri kejuruan.</p>
                <p>Galeri Kejuruan adalah perwujudan dari Gagasan Lewat Materi Kejuruan, merupakan pusat atau sumber
                    belajar dan wahana peningkatan kompetensi untuk berbagai Kompetensi Keahlian.</p>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6 order-2">
            <div class="img-mandiri text-center">
                <img src="{{asset('guest/assets/images/pel-mandiri.png')}}" height="400px" width="400px" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 col-xl-6 mt-0 order-1 order-md-2 order-lg-2 order-xl-2">
            <div class="pel-terbimbing mt-5">
                <h1>Pelatihan Terbimbing</h1>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6 order-3 margin-pel-terbimbing">
            <div class="pel-terbimbing mt-5">
                <p>1. Pengembangan Keprofesian Berkelanjutan</p>
                <p>Pengembangan Keprofesian Berkelanjutan (PKB) merupakan program pemberdayaan komunitas Guru dan Tenaga
                    Kependidikan melalui Ditjen GTK yang dilaksanakan oleh BB/BPPMPV sebagai Unit Pelaksana Teknis (UPT)
                    serta Dinas Pendidikan atau instansi lainnya.</p>
                <p>Program PKB dilaksanakan dalam tiga (3) moda, yaitu 1) Tatap Muka/Luring, 2) Daring Murni, 3) Daring
                    Kombinasi.</p>
                <p>2. <span class="font-italic">Upskilling dan Reskilling</span></p>
                <p>Program <span class="font-italic">Upskilling dan Reskilling</span> berstandar Industri awalnya
                    merupakan kerjasama Direktorat Kemitraan dan Penyelarasan Dunia Usaha Dunia Industri (Dit.Mitras
                    DUDI) dengan BB/BPPMPV yang sekarang telah menjadi TUSI langsung BB/BPPMPV dalam rangka 1)
                    Akselerasi peningkatan kompetensi guru kejuruan SMK sesuai dengan standar Dunia Usaha dan Dunia
                    Industri (DUDI) atau dunia kerja, 2) Memastikan kompetensi guru kejuruan ditingkatkan sesuai standar
                    DUDI serta 3) Berlatih kurikulum yang menekankan pada <span class="font-italic">soft skills</span>
                    dan PJBL, termasuk mengembangkan mapel bersama dengan DUDI, dengan harapan dapat meningkatkan
                    kualitas hasil belajar siswanya.
                </p>
                <p>3. Suplemen Kompetensi Keahlian</p>
                <p>Program Suplemen Kompetensi Keahlian merupakan program yang diusung Direktorat Jendral Pendidikan
                    Vokasi dalam rangka peningkatan kompetensi dan profesionalisme Guru dan Tenaga Kependidikan.</p>
                <p>Terbentuknya Guru yang kompeten dan professional melalui program ini diarahkan agar 1) Dapat
                    mengantarkan lahirnya para lulusan Pendidikan vokasi yang kompeten serta terampil, 2) Dapat
                    menciptakan kurikulum yang adaptif, agile dan fleksibel yang berlandaskan Pembelajaran berbasis
                    Proyek dari Industri, berbasis riset terapan dan berbasis teaching factory, 3) Dapat mengantarkan
                    terbentuknya pribadi Guru dengan jiwa kewirausahaan yang tangguh, dan 4) Memiliki jiwa kepemimpinan
                    yang visioner dan kemampuan manajerial yang kuat.</p>
                <p>Program Suplemen Kompetensi Keahlian didukung oleh pengajar internal yang kompeten serta melibatkan
                    pengajar tamu industri, menerapkan rekognisi pembelajaran lampau, magang/praktik kerja industri agar
                    terjadi hilirisasi berupa SDM dengan mindset kreatif dan inovatif serta memiliki kepemimpinan yang
                    tinggi.
                </p>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6 order-2 order-lg-1 order-xl-1">
            <div class="img-terbimbing text-center">
                <img src="{{asset('guest/assets/images/pel-terbimbing.png')}}" height="500px" width="500px" />
            </div>
        </div>
    </div>
</div>

<div class="bg-office"></div>
<div class="participant">
    <div class="container">
        <div class="row justify-content-start text-center">
            <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                <div class="peserta text-start">
                    <div class="row">
                        <div class="col-6">
                            <p>Jumlah Peserta Pelatihan Mandiri</p>
                            <h1>537</h1>
                        </div>
                        <div class="mandiri-image col-5 col-xl-6">
                            <img src="{{asset('guest/assets/images/peserta.png')}}" height="80px" width="100px" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                <div class="peserta text-start">
                    <div class="row">
                        <div class="col-6">
                            <p>Jumlah Peserta Pelatihan Terbimbing</p>
                            <h1>43.359</h1>
                        </div>
                        <div class="terbimbing-image col-5 col-xl-6">
                            <img src="{{asset('guest/assets/images/peserta.png')}}" height="80px" width="100px" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                <div class="peserta text-start">
                    <div class="row">
                        <div class="col-6">
                            <p>Jumlah Sertifikat</p>
                            <br>
                            <h1>77</h1>
                        </div>
                        <div class="sertifikat-image col-5 col-xl-6">
                            <img src="{{asset('guest/assets/images/sertifikat.png')}}" height="80px" width="90px" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                <div class="peserta text-start">
                    <div class="row">
                        <div class="col-6">
                            <p>Jumlah Pengunjung</p>
                            <br>
                            <h1>{{$jumlahVisitor}}</h1>
                        </div>
                        <div class="pengunjung-image col-5 col-xl-6">
                            <img src="{{asset('guest/assets/images/pengunjung.png')}}" height="80px" width="90px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="text-afiliasi text-center">
            <h1>Industri Mitra BMTI</h1>
            <hr />
        </div>
    </div>

    <div class="testimonials owl-theme owl-carousel">
        <div class="carousel-inner">
            <div class="row justify-content-center">
                @foreach($pageOne as $mitra1)
                <div class="col-3 mt-4">
                    <div class="row justify-content-center">
                        <div class="col-10 col-xl-6">
                            <div class="text-center mt-2">
                                <img src="{{asset('images/perusahaan-mitra/'.$mitra1->gambar_logo)}}" width="100px"
                                    height="80px" />
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="carousel-inner">
            <div class="row justify-content-center">
                @foreach($pageTwo as $mitra2)
                <div class="col-3 mt-4">
                    <div class="row justify-content-center">
                        <div class="col-8 col-xl-6">
                            <div class="text-center mt-2">
                                <img src="{{asset('images/perusahaan-mitra/'.$mitra2->gambar_logo)}}" width="100px"
                                    height="80px" />
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="testimonial">
            <h1>Testimonial Peserta</h1>
            <hr />
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 mx-auto testimonials owl-theme owl-carousel">
            @foreach($testimoni as $ts)
            <div class="d-flex align-items-center bg-white shadow-lg">
                <div class="author-img"> <img src="" class="img-fluid"> </div>
                <div class="author-text p-lg-5">
                    <div class="px-5">
                        <p class="lead pb-lg-5" style="color:#14395B;">
                            "{{substr($ts->testimoni, 0, 300);}} ...."</p>
                        <h4 class="font-weight-bold" style="color:#14395B;">{{$ts->nama}}</h4>
                        <p class="text-muted mb-0">{{$ts->asal_sekolah}}</p>
                        <p class="text-muted mb-0">{{$ts->nama_diklat}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$(".testimonials").owlCarousel({
    items: 1,
    margin: 20,
    nav: true,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
});
</script>
@endsection