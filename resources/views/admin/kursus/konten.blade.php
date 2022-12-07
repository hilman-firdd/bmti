@extends('layouts.master')
@section('title', 'BMTI - Konten Pelatihan Mandiri')
@section('content')

@section('custom-css')
<style>
.backdrop-modal {
    padding: 20px;
    position: absolute;
    top: 200px;
    width: 95%;
    right: 2%;
    height: auto;
    background-color: white;
    border: 1px solid #ddd;
    box-shadow: 0.2px 0.6px 0.5px 0.5px;
    z-index: 1;
}

.topik {
    padding-left: 30px;
    display: flex;
    color: #8D8D8D;
}

.pelatihan {
    display: flex;
}

.pelatihan i {
    float: inline-end;
}

.button-container {
    margin-top: 20px;
}

#modal-topik {
    position: fixed;
    left: 400px;
    min-width: 1000px;
}

.konten {
    padding-left: 30px;
}

.kuis {
    padding-left: 30px;
}

.btn-tambah-konten a {
    text-decoration: none;
}

.header-container {
    background-color: #ebebeb;
}

.font-italic {
    font-style: italic;
}

@media only screen and (min-width: 400px) and (max-width: 767px) {
    .marginResponsive {
        margin-top: 25px;
    }
}
</style>
@endsection

<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8 grid-margin">
            <form id="form-informasi" action="{{route('pelatihan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row header-container mb-3 p-2 marginResponsive">
                    <div class="col-sm-7">
                        <h3>Konten</h3>
                        <p>Deskripsi Konten dan Tujuan Konten yang Akan Dilakukan</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="pt-2 pl-3">
                            <a class="btn btn-md btn-rounded btn-danger btn-block" href="#"
                                onclick="history.back()">Batal</a>
                            <a id="btn-to-konten-lesson" class="btn btn-md btn-rounded btn-primary btn-block" href="#"
                                style="margin-left:10px;">Selanjutnya</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Isi konten</label>
                    <div class="col-sm-9">
                        <div class="pt-2">
                            <input type="radio" class="form-check-input" name="options" value="materi_pembelajaran"
                                checked> Materi Pembelajaran <br>
                            <input type="radio" class="form-check-input" name="options" value="kuis"> Kuis
                        </div>
                    </div>
                </div>
            </form>
            <form id="form-materi-pembelajaran" action="{{route('pelatihan.topik.kontenPembelajaran.store')}}"
                method="POST" class="d-none" enctype="multipart/form-data">
                @csrf
                <div class="row header-container mb-3 p-2 marginResponsive">
                    <div class="col-sm-7">
                        <h3>Konten</h3>
                        <p>Deskripsi Konten dan Tujuan Konten yang Akan Dilakukan</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="pt-2 pl-3">
                            <a id="btn-cancel-from-materi-pembelajaran"
                                class="btn btn-md btn-rounded btn-danger btn-block" href="#">Batal</a>
                            <a id="btn-to-konten-lesson" class="btn btn-md btn-rounded btn-primary btn-block"
                                style="margin-left:10px;" href="#"
                                onclick="document.getElementById('form-materi-pembelajaran').submit();">Simpan
                                Konten</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul" class="form-control mt-2">
                    </div>
                </div>
                <div class="row">
                    <label for="judul" class="col-sm-2 col-form-label">Materi</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="materi" class="ckeditor form-control" height="200"></textarea>
                        <input type="hidden" name="topikId" value="{{$topikId}}">
                        <input type="hidden" name="pelatihanId" value="{{$pelatihanId}}">
                    </div>
                </div>
                <div class="row">
                    <label for="judul" class="col-sm-2 col-form-label">Upload File</label>
                    <div class="col-sm-10">
                        <input type="file" name="file" class="form-control mt-2">
                    </div>
                </div>
            </form>
            <form id="form-kuis" action="{{route('pelatihan.topik.kontenQuiz.store')}}" method="POST" class="d-none"
                enctype="multipart/form-data">
                @csrf
                <div class="row header-container mb-3 p-2 marginResponsive">
                    <div class="col-sm-7">
                        <h3>Konfigurasi Kuis</h3>
                        <p>Konfigurasi Kuis Yang akan Dilaksanakan</p>
                        <input type="hidden" name="topik_id" value="{{$topikId}}">
                        <input type="hidden" name="pelatihan_id" value="{{$pelatihanId}}">
                    </div>
                    <div class="col-sm-5">
                        <div class="pt-2 pl-3">
                            <a id="btn-cancel-from-konfigurasi-kuis" class="btn btn-md btn-rounded btn-danger btn-block"
                                href="#">Batal</a>
                            <a id="btn-to-konten-lesson" class="btn btn-md btn-rounded btn-primary btn-block" href="#"
                                style="margin-left:10px;"
                                onclick="document.getElementById('form-kuis').submit();">Simpan Kuis</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="judul" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="form-check col-sm-1">
                        <label class="form-check-label">
                            <input id="ckWaktu" type="checkbox" class="form-check-input d-none">
                        </label>
                    </div>
                    <div class="form col-sm-3">
                        <input id="input-waktu" type="text" name="waktu" class="form-control mt-2">
                    </div>
                </div>
                <div class="row">
                    <p class="font-italic">Waktu yang diberikan untuk mengerjakan soal kuis kepada peserta (Menit)</p>
                </div>
                <div class="row">
                    <label for="judul" class="col-sm-2 col-form-label">Nilai Minimal</label>
                    <div class="form-check col-sm-1">
                        <label class="form-check-label">
                            <input id="ckNilai" type="checkbox" class="form-check-input">
                        </label>
                    </div>
                    <div class="form col-sm-3">
                        <input id="input-nilai" type="text" name="nilaiMinimal" class="form-control mt-2">
                    </div>
                </div>
                <div class="row">
                    <p class="font-italic">Nilai minimal yang yang dibutuhkan untuk ketentuan yang diberikan</p>
                </div>
                <div class="row">
                    <label for="judul" class="col-sm-2 col-form-label">Mandatori</label>
                    <div class="form-check col-sm-9">
                        <label class="form-check-label">
                            <input type="checkbox" name="mandatori" value="1" class="form-check-input">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <p class="font-italic">Kenbutuhan tertentu untuk melanjutkan pembelajaran ke topik berikutnya</p>
                </div>
                <div class="row">
                    <label for="judul" class="col-sm-2 col-form-label">Dapat Diulang</label>
                    <div class="form-check col-sm-9">
                        <label class="form-check-label">
                            <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <p class="font-italic">Kuis dapat dilakukan lebih dari satu kali oleh peserta</p>
                </div>
                <div class="row">
                    <label for="judul" class="col-sm-2 col-form-label">Final Test</label>
                    <div class="form-check col-sm-9">
                        <label class="form-check-label">
                            <input type="checkbox" id="finalTest" name="finalTest" value="1" class="form-check-input">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <p class="font-italic">Final test atau test akhir adalah soal akhir yang harus dikerjakan oleh peserta setelah melakukan pembelajaran.</p>
                </div>
                <div class="row">
                    <label for="judul" class="col-sm-5 col-form-label">Pilih Kuis Yang Akan Digunakan :</label>
                    <div class="col-sm-8">

                    </div>
                </div>
                @foreach($quizes as $q)
                <div class="row">
                    <label class="form-check-label col-sm-12 d-flex">
                        <input type="checkbox" name="quizOptions[]" value="{{$q->id}}" class="form-check-input"
                            style="margin-right: 10px;">
                        <p class="">{{$q->judul}}</p>
                    </label>
                </div>
                @endforeach

                <div class="row checkFeedback d-none">
                    <label for="judul" class="col-sm-12 col-form-label">Pilih pertanyaan feedback Yang akan Digunakan :</label>
                    <div class="col-sm-8">

                    </div>
                </div>
                @foreach($feedback as $f)
                <div class="row checkFeedback d-none">
                    <label class="form-check-label col-sm-12 d-flex">
                        <input type="checkbox" name="quizOptions[]" value="{{$f->id}}" class="form-check-input"
                            style="margin-right: 10px;">
                        <p class="">{{$f->judul}}</p>
                    </label>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.ckeditor').ckeditor();
});

$('#btn-to-konten-lesson').click(function() {

    if ($('input[name="options"]:checked').val() == 'kuis') {
        $('#form-kuis').removeClass('d-none')
        $('#form-informasi').addClass('d-none')
    } else {
        $('#form-materi-pembelajaran').removeClass('d-none')
        $('#form-informasi').addClass('d-none')
    }
});

$('#btn').click(function() {
    $('#form-materi-pembelajaran').removeClass('d-none')
    $('#form-informasi').addClass('d-none')
});

$('#btn-cancel-from-konfigurasi-kuis').click(function() {
    $('#form-informasi').removeClass('d-none')
    $('#form-kuis').addClass('d-none')
});

$('#btn-cancel-from-materi-pembelajaran').click(function() {
    $('#form-informasi').removeClass('d-none')
    $('#form-materi-pembelajaran').addClass('d-none')
});

$('#input-waktu').hide()
$('#input-nilai').hide()

$('#ckWaktu').change(function() {
    if ($(this).is(":checked")) {
        $('#input-waktu').show()
    } else {
        $('#input-waktu').hide()
    }
});

$('#ckNilai').change(function() {
    if ($(this).is(":checked")) {
        $('#input-nilai').show()
    } else {
        $('#input-nilai').hide()
    }
});

$('#finalTest').change(function() {
    if ($(this).is(":checked")) {
        $('.checkFeedback').removeClass('d-none')
    } else {
        $('.checkFeedback').addClass('d-none')
    }
});
</script>
@endsection