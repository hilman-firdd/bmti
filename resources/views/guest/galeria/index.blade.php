@extends('layouts.master_front')
@section('title', 'BMTI - Galeria')

@section('content')
<div class="galeria">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-11 col-xl-12 text-galeria order-1">
                <h2>Ayo Belajar Mandiri !</h2>
                <h1>Galeria Kompetensi Keahlian</h1>
                <br />
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-7 col-xl-7 text-galeria mt-0 order-3 order-lg-2 order-xl-2">
                <p>Galeria merupakan kumpulan materi kejuruan dalam bentuk tulisan, video maupun animasi yang memberi informasi singkat tentang konten kejuruan. Galeria diharapkan dapat menjawab kebutuhan peningkatan kompetensi guru kejuruan, sekaligus menyediakan bahan ajar bagi guru kejuruan maupun non kejuruan, yang tertarik mempelajari materi pembelajaran secara singkat dan spesifik.</p>

                <div class="search-box mt-5">
                    <i class="fas fa-search" type="button"></i>
                    <input type="text" class="search-input" placeholder="Cari Kompetensi mu..." />
                </div>
            </div>

            <div class="col-12 col-lg-4 col-xl-5 order-2">
                <div class="img-galeria text-center">
                    <img src="{{asset('guest/assets/images/pel-mandiri.png')}}" height="380px" width="380px" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="col-5 col-lg-3 col-xl-3 logo-kemdikbud-galeria float-start">
                    <img src="{{asset('guest/assets/images/logo-kemdikbud.png')}}" width="70px" height="70px" />
                    <p class="col-6">Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi</p>
                </div>
                <div class="col-5 col-lg-8 col-xl-9 logo-bmti-galeria float-start">
                    <img src="{{asset('guest/assets/images/logo-bmti.png')}}" width="70px" height="70px" />
                    <p class="col-6">BBPPMPV <br /> Bidang Mesin dan Teknik Industri</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="galeria-kompetisi text-center">
            <h1>Galeria Kompetensi Keahlian</h1>
            <p>Pilih kompetensi keahlian, kemudian simak materi pembelajaran yang disampaikan secara singkat.</p>
        </div>

        @foreach($data as $dt)
        <div class="col-12 col-md-4 col-xl-4">
            <div class="image shadow mt-5">
                <img src="{{asset('images/galeria/'.$dt->gambar_banner)}}" alt="Bricks" width="355px" height="245px" />
                <a href="{{url('/galeria/'.$dt->id)}}">
                    <div class="image-text">
                        <h4 class="col-11">{{$dt->nama_kompetensi}}</h4>
                        <p class="col-11">{{$dt->deskripsi}}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection