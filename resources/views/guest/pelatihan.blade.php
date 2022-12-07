@extends('layouts.master_front')

@section('content')
<div class="pelatihan-mandiri">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-sm-12 col-xl-10">
                <div class="text-mandiri">
                    <h1>Pelatihan Mandiri</h1>
                    <p>Pada Portal Pelatihan Mandiri – Pelatihan Mandiri adalah fasilitas yang diberikan kepada guru untuk melakukan latihan kompetensi keahlian sesuai pilihannya, yang dilaksanakan secara mandiri.</p>
                    <p>Pelatihan mandiri merupakan bagian dari galeri kejuruan. Galeri Kejuruan adalah perwujudan dari Gagasan Lewat Materi Kejuruan, merupakan pusat atau sumber belajar dan wahana peningkatan kompetensi untuk berbagai Kompetensi Keahlian.</p>
                    <p>Galeri Kejuruan diinisiasi oleh BBPPMPV Bidang Mesin dan Teknik Industri, untuk memerdekakan Guru dan Siswa dalam Proses Belajar dan Kegiatan Pembelajaran, yang dapat diakses secara virtual, kapan dan dimana saja.</p>
                    <span>Pilih pelatihan mandiri, kemudian simak materi pembelajaran yang disampaikan</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="col-5 col-sm-5 col-xl-3 logo-kemdikbud-mandiri float-start mt-5">
                    <image src="{{asset('guest/assets/images/logo-kemdikbud.png')}}" width="70px" height="70px" />
                    <p class="col-6">Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi</p>
                </div>
                <div class="col-5 col-sm-5 col-xl-9 logo-bmti-mandiri float-start mt-5">
                    <image src="{{asset('guest/assets/images/logo-bmti.png')}}" width="70px" height="70px" />
                    <p class="col-6">BBPPMPV <br /> Bidang Mesin dan Teknik Industri</p>
                </div>

                <div class="contact mt-4">
                    <Link href="">
                    <div class="image-contact"></div>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-4">
            <div class="card-pel shadow">
                <p class="title-free">Free</p>
                <image class="card-img-top" src="/images/pelatihan-1.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">TPGM-Membuat Model 3D dengan CAD</h2>
                    <Link href="/pelatihan-mandiri/membuat-model-3d"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-pel shadow">
                <p class="title-free">Free</p>
                <image class="card-img-top" src="/images/pelatihan-2.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">PLTS- Memasang Pembangkit Listrik Tenaga Surya (PLTS) Type Rooftop</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-pel shadow">
                <image class="card-img-top" src="/images/pelatihan-3.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-4.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-5.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-6.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-7.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-8.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-9.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-10.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-11.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-12.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-13.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-14.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-margin card-pel shadow mt-3">
                <image class="card-img-top" src="/images/pelatihan-15.png" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">BING-Classroom Language-1</h2>
                    <Link href="#"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></Link>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection