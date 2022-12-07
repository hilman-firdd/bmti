@extends('layouts.master_front')
@section('title', 'BMTI - Pelatihan Mandiri')

@section('content')
<div class="pelatihan-mandiri">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-sm-12 col-lg-10 col-xl-10">
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
                <div class="col-5 col-sm-5 col-lg-3 col-xl-3 logo-kemdikbud-mandiri float-start mt-5">
                    <image src="{{asset('guest/assets/images/logo-kemdikbud.png')}}" width="70px" height="70px" />
                    <p class="col-6">Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi</p>
                </div>
                <div class="col-5 col-sm-5 col-lg-8 col-xl-9 logo-bmti-mandiri float-start mt-5">
                    <image src="{{asset('guest/assets/images/logo-bmti.png')}}" width="70px" height="70px" />
                    <p class="col-6">BBPPMPV <br /> Bidang Mesin dan Teknik Industri</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="title-mandiri text-center">
            <h1>Pelatihan Mandiri</h1>
            <p>Pilih kompetensi keahlian, kemudian simak materi pembelajaran yang disampaikan secara singkat.</p>
        </div>
        @foreach($data as $dt)
        <div class="col-12 col-md-4 col-xl-4">
            <div class="card-pel shadow">
                <p class="title-free">Free</p>
                <img class="card-img-top" src="{{asset('/images/pelatihan/'.$dt->gambar)}}" alt="Card image cap" width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">{{$dt->judul}}</h2>
                    <a href="{{route('pelatihan.detail', ['id'=>$dt->id])}}"><button type="button" class="btn-pel btn-primary">Lihat Selengkapnya...</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection