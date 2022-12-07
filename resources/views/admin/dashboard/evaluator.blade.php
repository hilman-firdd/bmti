@extends('layouts.master')
@section('title', 'BMTI - Dashboard Evaluator')
@section('custom-css')

<head>
    <link rel="stylesheet" href="{{asset('guest/assets/bootstrap/css/bootstrap.min.css')}}">
</head>

<style>
/* Dashboard Evaluasi Diklat */
.container,
.container-fluid,
.container-lg,
.container-md,
.container-sm,
.container-xl,
.container-xxl {
    padding-left: 0;
    padding-right: 0;
}

.cardPelatihanTerevaluasi {
    border-radius: 5px;
    font-family: "glory";
    background-color: #7070FF;
    color: white;
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardPelatihanTerevaluasi h6 {
    font-size: 15px;
    font-weight: 600;
}

.cardPelatihanTerevaluasi h1 {
    font-weight: 600;
}

.cardPelatihanTerevaluasi span {
    font-size: 15px;
    font-weight: 600;
}

.cardBelumTerevaluasi {
    border-radius: 5px;
    font-family: "glory";
    background-color: #FF5757;
    color: white;
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardBelumTerevaluasi h6 {
    font-size: 15px;
    font-weight: 600;
}

.cardBelumTerevaluasi h1 {
    font-weight: 600;
}

.cardBelumTerevaluasi span {
    font-size: 15px;
    font-weight: 600;
}

.cardPelatihanSTTPL {
    border-radius: 5px;
    font-family: "glory";
    background-color: #B22727;
    color: white;
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardPelatihanSTTPL h6 {
    font-size: 15px;
    font-weight: 600;
}

.cardPelatihanSTTPL h1 {
    font-weight: 600;
}

.cardPelatihanSTTPL span {
    font-size: 15px;
    font-weight: 600;
}

.cardDimensiLayanan {
    padding: 10px;
    border-radius: 10px;
    background-color: white;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    height: auto;
    width: 100%;
}

.cardDimensiLayanan h6 {
    margin-top: 40px;
    font-family: "glory";
    font-size: 15px;
    font-weight: 600;
}

.cardStandarPelayanan {
    padding: 10px;
    border-radius: 10px;
    background-color: white;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    height: auto;
    width: 100%;
}

.cardStandarPelayanan h6 {
    margin-top: 40px;
    font-family: "glory";
    font-size: 15px;
    font-weight: 600;
}

.cardPredikatKelulusan {
    padding: 10px;
    border-radius: 10px;
    background-color: white;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    height: auto;
    width: 100%;
}

.cardPredikatKelulusan h6 {
    margin-top: 60px;
    font-family: "glory";
    font-size: 15px;
    font-weight: 600;
}

.textPredikatKelulusan {
    margin-left: 10px;
    text-align: start;
    font-size: 12px;
    font-weight: 600;
}

.cardEvaluasiPengajar {
    font-family: "glory";
    font-size: 12px;
    font-weight: 600;
    height: 225px;
    width: 100%;
    overflow: hidden;
}

.cardEvaluasiPengajar h5 {
    font-weight: 600;
    font-size: 16px;
}

.cardEvaluasiPengajar i {
    padding-top: 5px;
    height: 20px;
    width: 20px;
    text-align: center;
    background-color: #1492E6;
    font-size: 10px;
    color: white;
    cursor: pointer;
}

.tableEvaluasiPengajar {
    overflow: scroll;
    height: 200px;
    padding-right: 5px;
}

.cardSaran {
    font-family: "glory";
    font-size: 12px;
    font-weight: 600;
    height: 225px;
    width: 100%;
    overflow: hidden;
}

.cardSaran h5 {
    font-weight: 600;
    font-size: 16px;
}

.cardSaran i {
    padding-top: 5px;
    height: 20px;
    width: 20px;
    text-align: center;
    background-color: #1492E6;
    font-size: 10px;
    color: white;
    cursor: pointer;
}

.tableSaran {
    overflow: scroll;
    height: 200px;
    padding-right: 5px;
}

.cardEvaluasiPenyelenggara {
    font-family: "glory";
    font-size: 12px;
    font-weight: 600;
    height: 225px;
    width: 100%;
    overflow: hidden;
}

.cardEvaluasiPenyelenggara h5 {
    font-weight: 600;
    font-size: 16px;
}

.cardEvaluasiPenyelenggara i {
    padding-top: 5px;
    height: 20px;
    width: 20px;
    text-align: center;
    background-color: #1492E6;
    font-size: 10px;
    color: white;
    cursor: pointer;
}

.tableEvaluasiPenyelenggara {
    overflow: scroll;
    height: 200px;
    padding-right: 5px;
}

.cardSertifikatTerbit {
    font-family: "glory";
    font-size: 12px;
    font-weight: 600;
    height: 225px;
    width: 100%;
    overflow: hidden;
}

.cardSertifikatTerbit h5 {
    font-weight: 600;
    font-size: 16px;
}

.cardSertifikatTerbit i {
    padding-top: 5px;
    height: 20px;
    width: 20px;
    text-align: center;
    background-color: #1492E6;
    font-size: 10px;
    color: white;
    cursor: pointer;
}

.tableSertifikatTerbit {
    overflow: scroll;
    height: 200px;
    padding-right: 5px;
}

@media only screen and (min-width: 400px) and (max-width: 991px) {

    .marginCard {
        margin-top: 20px;
    }
}

@media only screen and (min-width: 992px) and (max-width: 1199px) {
    .margin-card {
        margin-top: 20px;
    }
}

/* End Dashboard Evaluasi Diklat */
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-4">
            <div class="marginCard">
                <div class="cardPelatihanTerevaluasi">
                    <div class="p-3 rounded shadow h-100">
                        <div class="row">
                            <div class="col-12">
                                <h6>Pelatihan yang telat dievaluasi</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-3 text-center col-4">
                                <h1>26</h1>
                                <span>Daring</span>
                            </div>
                            <div class="mt-3 text-center col-4">
                                <h1>4</h1>
                                <span>Luring</span>
                            </div>
                            <div class="mt-3 text-center col-4">
                                <h1>2</h1>
                                <span>Blended</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-4">
            <div class="marginCard">
                <div class="cardBelumTerevaluasi">
                    <div class="p-3 rounded shadow h-100">
                        <div class="row">
                            <div class="col-xl-12">
                                <h6>Pelatihan yang belum dievaluasi</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-3 text-center col-4">
                                <h1>0</h1>
                                <span>Daring</span>
                            </div>
                            <div class="mt-3 text-center col-4">
                                <h1>1</h1>
                                <span>Luring</span>
                            </div>
                            <div class="mt-3 text-center col-4">
                                <h1>0</h1>
                                <span>Blended</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-4">
            <div class="marginCard">
                <div class="cardPelatihanSTTPL">
                    <div class="p-3 rounded shadow h-100">
                        <div class="row">
                            <div class="col-12">
                                <h6>Pelatihan STTPL yang telah diterbitkan</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-3 text-center col-4">
                                <h1>477</h1>
                                <span>Daring</span>
                            </div>
                            <div class="mt-3 text-center col-4">
                                <h1>50</h1>
                                <span>Luring</span>
                            </div>
                            <div class="mt-3 text-center col-4">
                                <h1>31</h1>
                                <span>Blended</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 row justify-content-center">
        <div class="col-12 col-sm-10 col-md-12 col-lg-6 col-xl-4">
            <div class="row">
                <div class="col-12">
                    <div class="cardDimensiLayanan">
                        <div class="row">
                            <div class="col-2">
                                <h6>Dimensi Layanan</h6>
                            </div>
                            <div class="col-10 text-end">
                                <image src="{{asset('guest/assets/images/dimensi-layanan.jpeg')}}" width="240px"
                                    height="120px" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="col-12">
                    <div class="cardStandarPelayanan">
                        <div class="row">
                            <div class="col-2">
                                <h6>Standar Pelayanan</h6>
                            </div>
                            <div class="col-10 text-end">
                                <image src="{{asset('guest/assets/images/standar-pelayanan.jpeg')}}" width="240px"
                                    height="130px" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="col-12">
                    <div class="cardPredikatKelulusan">
                        <div class="row">
                            <div class="col-2">
                                <h6>Predikat dan Kriteria Kelulusan</h6>
                            </div>
                            <div class="col-10 text-end">
                                <image src="{{asset('guest/assets/images/table-predikat.jpeg')}}" width="240px"
                                    height="130px" />
                                <p class="textPredikatKelulusan">Peserta yang memperoleh predikat minimal cukup akan
                                    diberikan sertifikat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-10 col-md-12 col-lg-6 col-xl-4">
            <div class="row">
                <div class="col-12">
                    <div class="marginCard">
                        <div class="p-3 bg-white rounded shadow h-100">
                            <div class="cardEvaluasiPengajar">
                                <h5>Hasil Evaluasi terhadap Pengajar</h5>
                                <div class="tableEvaluasiPengajar">
                                    <table class="table text-center table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Pengajar</th>
                                                <th scope="col">Rata - Rata</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 row">
                <div class="col-12">
                    <div class="p-3 bg-white rounded shadow h-100">
                        <div class="cardSaran">
                            <h5>Saran/Masukan/Testimoni Peserta</h5>
                            <div class="tableSaran">
                                <table class="table text-center table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Pengajar</th>
                                            <th scope="col">Rata - Rata</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-4">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-12">
                    <div class="marginCard">
                        <div class="p-3 bg-white rounded shadow margin-card h-100">
                            <div class="cardEvaluasiPenyelenggara">
                                <h5>Hasil Evaluasi Penyelenggara Pelatihan</h5>
                                <div class="tableEvaluasiPenyelenggara">
                                    <table class="table text-center table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Pengajar</th>
                                                <th scope="col">Rata - Rata</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fa-solid fa-eye"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 col-lg-6 col-xl-12">
                    <div class="p-3 bg-white rounded shadow h-100">
                        <div class="cardSertifikatTerbit">
                            <h5>Sertifikat yang sudah diterbitkan</h5>
                            <div class="tableSertifikatTerbit">
                                <table class="table text-center table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Pengajar</th>
                                            <th scope="col">Rata - Rata</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td></td>
                                            <td></td>
                                            <td><i class="fa-solid fa-eye"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
</script>
@endsection