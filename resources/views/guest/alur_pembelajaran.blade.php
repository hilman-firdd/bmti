@extends('layouts.master_front') @section('content')
@section('title', 'BMTI - Alur Pembelajaran')

<div class="alur-pembelajaran">
    <div class="container">
        <div class="row">
            <div class="col-12 road-map text-center">
                <div id="step1" class="">
                    <div class="text1">Alur Pembelajaran</div>

                    <div class="alur-start text-center">
                        <button type="button" class="tablinks myButton" onclick="step1OnClick()">Galeria</button>
                    </div>
                </div>
                <div id="step2" class="d-none">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-6 mb-3 mt-1">
                            <img class="alur-img center rounded" src="{{asset('guest/assets/images/list-galeria.PNG')}}"
                                alt="" width="550" height="330" />
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6">
                            <h3 class="text-light"><b>GALERIA</b></h3>
                            <h3 class="text-light">Galeria merupakan kumpulan materi kejuruan dalam bentuk tulisan,
                                video maupun animasi yang memberi informasi singkat tentang konten kejuruan.</h3>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button class="tablinks myButton1 center" onclick="step2OnClick()"><b>Pelatihan
                                Mandiri</b></button>
                        <button class="tablinks myButton1" onclick="onClickKembali1()">Kembali</button>
                    </div>
                </div>

                <div id="step3" class="d-none">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-6 mb-3">
                            <img class="alur-img center rounded"
                                src="{{asset('guest/assets/images/kompetensi-kejuruan.PNG')}}" alt="" width="550"
                                height="330" />
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6">
                            <h3 class="text-light"><b>PELATIHAN MANDIRI</b></h3>
                            <h3 class="text-light">Menyajikan deskripsi materi pembelajaran dengan: H5P, video shooting
                                merekam gambar bergerak, animasi seolah bergerak yang disajikan dengan citra/sudut
                                pandang 2 dimensi maupun 3 dimensi serta dilengkapi materi pendukung berformat
                                pdf.
                            </h3>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button class="tablinks myButton1 center" onclick="step3OnClick()"><b>Pelatihan
                                Terbimbing</b></button>
                        <button class="tablinks myButton1" onclick="onClickKembali2()">Kembali</button>
                    </div>
                </div>

                <div id="step4" class="d-none">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-6 mb-3">
                            <img class="alur-img center rounded" src="{{asset('guest/assets/images/kk-materi.PNG')}}"
                                alt="" width="550" height="330" />
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6">
                            <h3 class="text-light"><b>PELATIHAN TERBIMBING</b></h3>
                            <h3 class="text-light">Materi kejuruan berisikan materi - materi yang akan digunakan untuk
                                pembelajaran di galeri kejuruan.</h3>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button class="tablinks myButton1 center" onclick="step4OnClick()"><b>Sertifikat</b></button>
                        <button class="tablinks myButton1" onclick="onClickKembali3()">Kembali</button>
                    </div>
                </div>

                <div id="step5" class="d-none">
                    <div class="row justify-items-center">
                        <div class="col-12">
                            <h3 class="text-light"><b>SERTIFIKAT</b></h3>
                            <div class="mb-3">
                                <img class="sertifikat-img center rounded"
                                    src="{{asset('guest/assets/images/sertifikat2.PNG')}}" alt="" width="500"
                                    height="550" />
                            </div>
                            <h3 class="text-light">
                                Setelah peserta menyelesaikan pelatihan terbimbing, maka peserta akan mendapatkan
                                sertifikat sesuai dengan pelatihan yang sudah diambil.
                            </h3>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button class="open-button tablinks myButton1" onclick="onClickAlur()">Lihat Alur
                            Pembelajaran</button> &nbsp;&nbsp;&nbsp;
                        <button class="tablinks myButton1" onclick="onClickKembaliKeawal()">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="alur" class="d-none">
    <div class="bg-alur">
        <div class="d-flex">
            <div class="col-12 text-center">
                <div class="img-alur">
                    <img class="rounded" src="{{asset('guest/assets/images/alur.png')}}" width="1300"
                        height="600" />
                </div>
                <div class="btn-closeAlur">
                    <button class="btn btn-danger btn-sm btn-circle" onclick="onClickCloseAlur()">X</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
function step1OnClick() {
    $('#step1').addClass('d-none');
    $('#step2').attr('class', '');
}

function step2OnClick() {
    $('#step2').addClass('d-none');
    $('#step3').attr('class', '');
}

function step3OnClick() {
    $('#step3').addClass('d-none');
    $('#step4').attr('class', '');
}

function step4OnClick() {
    $('#step4').addClass('d-none');
    $('#step5').attr('class', '');
}

function onClickKembali1() {
    $('#step1').attr('class', '');
    $('#step2').addClass('d-none');
}

function onClickKembali2() {
    $('#step2').attr('class', '');
    $('#step3').addClass('d-none');
}

function onClickKembali3() {
    $('#step3').attr('class', '');
    $('#step4').addClass('d-none');
}

function onClickKembaliKeawal() {
    $('#step1').attr('class', '');
    $('#step5').addClass('d-none');
}

function onClickAlur() {
    $('#alur').attr('class', '');
}

function onClickCloseAlur() {
    $('#alur').addClass('d-none');
}
</script>
@endsection