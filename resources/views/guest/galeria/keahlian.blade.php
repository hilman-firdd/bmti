@extends('layouts.master_front')
@section('title', 'Galeria - '.$kompetensi->nama_kompetensi)

@section('content')
<div class="teknik-permesinan">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-11 col-xl-12 text-kompetensi order-1">
                <h1>{{$kompetensi->nama_kompetensi}}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-7 col-xl-7 text-kompetensi mt-0 order-3 order-lg-2">
                <p>{{$kompetensi->deskripsi}}</p>
            </div>
            <!-- <div class="col-12 col-xl-7 text-kompetensi mt-0 order-3 order-md-2">
                <iframe height="400" width="400" src="{{asset('/files/galeria/Tugas1_MetodologiPenelitian_SofyanIbnuAbdilah_55201119024.pdf')}}"></iframe>
            </div> -->

            <div class="col-12 col-md-11 col-xl-5 order-2 image-permesinan">
                <div class="image-teknik-permesinan d-flex justify-content-end">
                    <div class="p-1">
                        <img class="rounded" src="{{asset('guest/assets/images/perme.png')}}" width="290px"
                            height="160px" />
                    </div>
                    <div class="p-1">
                        <img class="rounded" src="{{asset('guest/assets/images/maklumatplayanan2.png')}}" width="290px"
                            height="160px" />
                    </div>
                </div>
                <div class="image-teknik-permesinan d-flex justify-content-end">
                    <div class="p-1">
                        <img class="rounded" src="{{asset('guest/assets/images/maklumatplayanan5.png')}}" width="290px"
                            height="160px" />
                    </div>
                    <div class="p-1">
                        <img class="rounded" src="{{asset('guest/assets/images/maklumatplayanan6.png')}}" width="290px"
                            height="160px" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6">
                <div class="col-5 col-lg-6 col-xl-6 logo-kemdikbud-kompetensi float-start">
                    <img src="{{asset('guest/assets/images/logo-kemdikbud.png')}}" width="70px" height="70px" />
                    <p class="col-6">Kementrian Pendidikan, Kebudayaan, Riset dan Teknologi</p>
                </div>
                <div class="col-5 col-lg-5 col-xl-6 logo-bmti-kompetensi float-start">
                    <img src="{{asset('guest/assets/images/logo-bmti.png')}}" width="70px" height="70px" />
                    <p class="col-6">BBPPMPV BMTI <br /> Bidang Mesin dan Teknik Industri</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($allKategori as $ktg)
        <div class="col-2 text-center">
            <a href="{{('/galeria'.$ktg->id)}}" style="text-decoration: none;">
                <p class="galeria-kompetensi-kategori">{{$ktg->nama_kompetensi}}</p>
            </a>
        </div>
        @endforeach
    </div>

    <div class="row justify-content-center">
        @foreach($data as $dt)
        <div class="col-12 col-md-4 col-xl-4">
            <div class="img-teknik-permesinan shadow mt-5">
                <img src="{{ asset('/images/galeria/'.$dt->gambar_banner) }}" alt="Image" width="355px" height="245px" />
                <a href="{{route('galeria.materi', [$dt->id])}}">
                    <div class="image-text"></div>
                </a>
                <p>{{$dt->judul}}</p>
                <h5>{{ $dt->author }} {{ date('j F, Y', strtotime($dt->created_at)) }}</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>


<!-- Modal -->
<!-- <div id="materi" class="d-none">
    <div class="bg-materi">
        <div class="bg-komptensi-materi">
            <div class="materi">
                <div class="row">
                    <div class="col-11">
                        <h4 class="materi-title">Teknik Permesinan</h4>
                        <h2 class="materi-title-2">Tool Set Pada Mesin bubut CNC</h2>
                    </div>
                    <div class="col-1 button-kompetisi">
                        <button class="btn btn-danger btn-circle btn-sm close float-end" onclick="onClickCloseMateri()">X</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="title-by">
                            <img src="{{asset('guest/assets/images/avatar.png')}}" width="35px" height="35px" />
                            <p>By Joko Suseno</p>
                            <p>Last Update July 27, 2021</p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 col-xl-8 content-materi">
                        <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQcWphCu27eoXvxZo0LFBPR9HbBdijeTS-eJeGttCBWCZYp1Ihnn4r2F1n5AA8bfg/embed?start=false&loop=false&delayms=3000" frameborder="0" width="800" height="420" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-3 col-lg-1 col-xl-1">
                        <div class="shared">
                            <a href=""><img src="{{asset('guest/assets/images/share-shared.png')}}" width="70px" height="25px" /></a>
                        </div>
                    </div>
                    <div class="col-3 col-lg-1 col-xl-1">
                        <div class="shared">
                            <a href=""><img src="{{asset('guest/assets/images/fb-shared.png')}}" width="70px" height="25px" /></a>
                        </div>
                    </div>
                    <div class="col-3 col-lg-1 col-xl-1">
                        <div class="shared">
                            <a href=""><img src="{{asset('guest/assets/images/twitter-shared.png')}}" width="70px" height="25px" /></a>
                        </div>
                    </div>
                    <div class="col-3 col-lg-1 col-xl-1">
                        <div class="shared">
                            <a href=""><img src="{{asset('guest/assets/images/google.png')}}" width="70px" height="25px" /></a>
                        </div>
                    </div>
                    <div class="col-3 col-lg-1 col-xl-1">
                        <div class="shared">
                            <a href=""><img src="{{asset('guest/assets/images/reddit-shared.png')}}" width="70px" height="25px" /></a>
                        </div>
                    </div>
                    <div class="col-3 col-lg-1 col-xl-1">
                        <div class="shared">
                            <a href=""><img src="{{asset('guest/assets/images/pinterest-shared.png')}}" width="70px" height="25px" /></a>
                        </div>
                    </div>
                    <div class="col-3 col-lg-1 col-xl-1">
                        <div class="shared">
                            <a href=""><img src="{{asset('guest/assets/images/email-shared.png')}}" width="70px" height="25px" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<script>
function onClickMateri() {
    $('#materi').attr('class', '');
}

function onClickCloseMateri() {
    $('#materi').addClass('d-none');
}
</script>

@endsection