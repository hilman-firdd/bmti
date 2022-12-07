@extends('layouts.master')
@section('title', 'BMTI - Dashboard Peserta')
@section('custom-css')

<head>
    <link rel="stylesheet" href="{{asset('guest/assets/bootstrap/css/bootstrap.min.css')}}">
</head>

<style>
    /* Dashboard User */
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

    .list-content {
        width: 100%;
        margin-left: 5px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .cardPelatihan {
        width: 100%;
        height: 100%;
        font-family: "glory";
        overflow: hidden;
    }

    .cardPelatihan h5 {
        font-size: 16px;
        font-weight: 600;
    }

    .cardSertifikat {
        font-family: "glory";
        height: 340px;
        width: 100%;
        overflow: hidden;
    }

    .cardSertifikat h5 {
        font-weight: 600;
        font-size: 16px;
    }

    .textCardSertifikat {
        font-family: "glory";
        font-weight: 600;
        font-size: 12px;
        height: 280px;
        overflow: scroll;
        padding-right: 10px;
    }

    .textCardSertifikat::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }

    .textCardSertifikat::-webkit-scrollbar-thumb {
        border: 1px solid #9c9c9c;
        background: #c2c2c2;
        border-radius: 10px;
    }

    .textCardSertifikat::-webkit-scrollbar-thumb:hover {
        background: #9c9c9c;
    }

    .textCardSertifikat::-webkit-scrollbar-track {
        background: transparent;
    }

    .textCardSertifikat b {
        cursor: pointer;
        color: #53C7FF;
    }

    .cardKursus {
        font-family: "glory";
        height: 100%;
        width: 100%;
        overflow: hidden;
    }

    .cardKursus h5 {
        font-weight: 600;
        font-size: 16px;
    }

    .textCardKursus {
        font-weight: 600;
        font-size: 12px;
        height: 280px;
        overflow: scroll;
        padding-right: 10px;
    }

    .textCardKursus::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }

    .textCardKursus::-webkit-scrollbar-thumb {
        border: 1px solid #9c9c9c;
        background: #c2c2c2;
        border-radius: 10px;
    }

    .textCardKursus::-webkit-scrollbar-thumb:hover {
        background: #9c9c9c;
    }

    .textCardKursus::-webkit-scrollbar-track {
        background: transparent;
    }

    .textCardKursus span {
        margin-bottom: -10px;
    }

    .cardAktifitas {
        font-family: "glory";
        height: 100%;
        width: 100%;
        overflow: hidden;
    }

    .cardAktifitas span {
        font-weight: 600;
        font-size: 14px;
    }

    .cardAktifitas h5 {
        font-weight: 600;
        font-size: 16px;
    }

    .cardAktifitas i {
        padding: 4px;
    }

    .cardAktifitas .in {
        color: #06FF00;
    }

    .cardAktifitas i {
        padding: 4px;
    }

    .cardAktifitas .out {
        color: #FF0000;
    }

    .scrollCardAktifitas {
        overflow: scroll;
        height: 280px;
        padding-right: 10px;
    }

    .scrollCardAktifitas::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }

    .scrollCardAktifitas::-webkit-scrollbar-thumb {
        border: 1px solid #9c9c9c;
        background: #c2c2c2;
        border-radius: 10px;
    }

    .scrollCardAktifitas::-webkit-scrollbar-thumb:hover {
        background: #9c9c9c;
    }

    .scrollCardAktifitas::-webkit-scrollbar-track {
        background: transparent;
    }

    .cardDiklat {
        font-family: "glory";
        font-size: 12px;
        font-weight: 600;
        height: 320px;
        width: 100%;
        overflow: hidden;
    }

    .cardDiklat h5 {
        font-weight: 600;
        font-size: 16px;
    }

    .cardDiklat i {
        padding-top: 5px;
        height: 20px;
        width: 20px;
        text-align: center;
        background-color: #1492E6;
        font-size: 10px;
        color: white;
        cursor: pointer;
    }

    .tablePeserta {
        overflow: scroll;
        height: 300px;
        padding-right: 10px;
    }

    .tablePeserta::-webkit-scrollbar {
        margin: 10px;
        width: 10px;
        height: 10px;
    }

    .tablePeserta::-webkit-scrollbar-thumb {
        border: 1px solid #9c9c9c;
        background: #c2c2c2;
        border-radius: 10px;
    }

    .tablePeserta::-webkit-scrollbar-thumb:hover {
        background: #9c9c9c;
    }

    .tablePeserta::-webkit-scrollbar-track {
        background: transparent;
    }

    .cardStatistikKehadiran {
        font-size: 12px;
        font-weight: 600;
        font-family: "glory";
        height: 320px;
        width: 100%;
        overflow: hidden;
    }

    .cardStatistikKehadiran h5 {
        font-size: 16px;
        font-weight: 600;
    }

    .cardStatistikKehadiran i {
        margin-right: 10px;
    }

    .filter button {
        margin-left: 10px;
    }

    @media only screen and (min-width: 400px) and (max-width: 991px) {

        .marginCard {
            margin-top: 20px;
        }
    }

    /* End Dashboard User */
</style>

<script src="{{asset('admin/vendors/highchart/code/highcharts.js')}}"></script>
<script src="{{asset('admin/vendors/highchart/code/highcharts-3d.js')}}"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

@endsection @section('content')
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="marginCard">
                <div class="shadow p-3 bg-white rounded text-center h-100">
                    <div class="cardPelatihan">
                        <h5 class="text-center">Pelatihan Berjalan</h5>
                        <div class="filter mb-2 font-weight-normal">
                            <select class="form-select" aria-label="Default select example">
                                <option value="">-- Pilih Pelatihan --</option>
                                @foreach($data as $dt)
                                <option value="{{$dt->id}}">{{$dt->kode}} - {{$dt->judul}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <figure class="highcharts-figure">
                            <div id="chart1" style="height: 250px; margin:auto;"></div>
                        </figure> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="marginCard">
                <div class="shadow p-3 bg-white rounded h-100">
                    <div class="cardSertifikat">
                        <h5 class="text-center">Sertifikat Pelatihan</h5>
                        <div class="filter mb-1">
                            <select class="form-select" aria-label="Default select example">
                                <option value="">-- Pilih Pelatihan --</option>
                                @foreach($data as $dt)
                                <option value="{{$dt->id}}">{{$dt->kode}} - {{$dt->judul}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="textCardSertifikat">
                            <div class="d-flex flex-column">
                                <div class="list-content mt-1 bg-white rounded">
                                    <span class="p-2"></span>
                                    <div class="d-flex justify-content-between p-2">
                                        <span></span>
                                        <Link href="/"><b> &#62;&#62;&#62;</b></Link>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="shadow p-3 bg-white rounded h-100">
                <div class="cardKursus">
                    <h5 class="text-center">Statistik Kursus</h5>
                    {{-- <div class="textCardKursus">
                        <div class="d-flex flex-column">
                            <div class="list-content mt-2 bg-white rounded">
                                <div class="d-flex justify-content-between p-2">
                                    <span>Hari Ini</span>
                                    <span></span>
                                </div>
                                <div class="p-1">
                                    <progress class="p-2 w-100" value="30" max="100"></progress>
                                </div>
                            </div>
                            <div class="list-content mt-2 bg-white rounded">
                                <div class="d-flex justify-content-between p-2">
                                    <span>Minggu Ini</span>
                                    <span></span>
                                </div>
                                <div class="p-1">
                                    <progress class="p-2 w-100" value="25" max="100"></progress>
                                </div>
                            </div>
                            <div class="list-content mt-2 bg-white rounded">
                                <div class="d-flex justify-content-between p-2">
                                    <span>Bulan Ini</span>
                                    <span></span>
                                </div>
                                <div class="p-1">
                                    <progress class="p-2 w-100" value="40" max="100"></progress>
                                </div>
                            </div>
                            <div class="list-content mt-2 bg-white rounded">
                                <div class="d-flex justify-content-between p-2">
                                    <span>Tersisa</span>
                                    <span></span>
                                </div>
                                <div class="p-1">
                                    <progress class="p-2 w-100" value="30" max="100"></progress>
                                </div>
                            </div>
                            <div class="list-content mt-2 bg-white rounded">
                                <div class="d-flex justify-content-between p-2">
                                    <span>Tersisa</span>
                                    <span></span>
                                </div>
                                <div class="p-1">
                                    <progress class="p-2 w-100" value="30" max="100"></progress>
                                </div>
                            </div>
                            <div class="list-content mt-2 bg-white rounded">
                                <div class="d-flex justify-content-between p-2">
                                    <span>Tersisa</span>
                                    <span></span>
                                </div>
                                <div class="p-1">
                                    <progress class="p-2 w-100" value="30" max="100"></progress>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="marginCard">
                <div class="shadow p-3 bg-white rounded h-100">
                    <div class="cardAktifitas">
                        <h5 class="text-center">Aktifitas Masuk</h5>
                        {{-- <div class="scrollCardAktifitas">
                            <div class="d-flex flex-column">
                                <div class="list-content mt-2 bg-white rounded">
                                    <div class="d-flex p-2">
                                        <span class="in"><i class="fa-solid fa-circle-arrow-right"></i>&nbsp;</span>
                                        <span>Sabtu, 03 Juli 2022</span>
                                    </div>
                                </div>
                                <div class="list-content mt-2 bg-white rounded">
                                    <div class="d-flex p-2">
                                        <span class="out"><i class="fa-solid fa-circle-arrow-left"></i>&nbsp;</span>
                                        <span>Sabtu, 03 Juli 2022</span>
                                    </div>
                                </div>
                                <div class="list-content mt-2 bg-white rounded">
                                    <div class="d-flex p-2">
                                        <span class="in"><i class="fa-solid fa-circle-arrow-right"></i>&nbsp;</span>
                                        <span>Sabtu, 03 Juli 2022</span>
                                    </div>
                                </div>
                                <div class="list-content mt-2 bg-white rounded">
                                    <div class="d-flex p-2">
                                        <span class="out"><i class="fa-solid fa-circle-arrow-left"></i>&nbsp;</span>
                                        <span>Sabtu, 03 Juli 2022</span>
                                    </div>
                                </div>
                                <div class="list-content mt-2 bg-white rounded">
                                    <div class="d-flex p-2">
                                        <span class="in"><i class="fa-solid fa-circle-arrow-right"></i>&nbsp;</span>
                                        <span>Sabtu, 03 Juli 2022</span>
                                    </div>
                                </div>
                                <div class="list-content mt-2 bg-white rounded">
                                    <div class="d-flex p-2">
                                        <span class="out"><i class="fa-solid fa-circle-arrow-left"></i>&nbsp;</span>
                                        <span>Sabtu, 03 Juli 2022</span>
                                    </div>
                                </div>
                                <div class="list-content mt-2 bg-white rounded">
                                    <div class="d-flex p-2">
                                        <span class="in"><i class="fa-solid fa-circle-arrow-right"></i>&nbsp;</span>
                                        <span>Sabtu, 03 Juli 2022</span>
                                    </div>
                                </div>
                                <div class="list-content mt-2 bg-white rounded">
                                    <div class="d-flex p-2">
                                        <span class="out"><i class="fa-solid fa-circle-arrow-left"></i>&nbsp;</span>
                                        <span>Sabtu, 03 Juli 2022</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-12 col-lg-6 col-xl-6">
            <div class="shadow p-3 bg-white rounded h-100">
                <div class="cardDiklat">
                    <h5>Kegiatan Diklat Yang Telah Diikuti</h5>
                    {{-- <div class="tablePeserta">
                        <table class="table table-hover table-striped table-md text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Diklat</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($data as $dt)
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td>{{$dt->judul}}</td>
                                    <td>{{$dt->nama}}</td>
                                    <td><a href="{{route('peserta.pelatihan.katalog.detail', ['idPelatihan' => $dt->id])}}"><i class="fa-solid fa-eye"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6">
            <div class="marginCard">
                <div class="shadow p-3 bg-white rounded h-100">
                    <div class="cardStatistikKehadiran">
                        <h5><i class="fa-solid fa-chart-simple"></i>Statistik Lama Waktu Kehadiran</h5>
                        {{-- <div class="d-flex justify-content-between">
                            <div class="date-text">2 Maret 2022</div>
                            <div class="filter">
                                <button class="btn btn-sm btn-primary">Bulan</button>
                                <button class="btn btn-sm btn-primary">Tahun</button>
                            </div>
                        </div>
                        <figure class="highcharts-figure">
                            <div id="chart2" style="height: 250px; margin:auto;"></div>
                        </figure> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @section('script')
<script type="text/javascript">
    Highcharts.chart('chart1', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:12px; fontFamily:glory;">{point.key}</span><table>',
            pointFormat: '<tr><td style="fontFamily:glory;">{series.name} : </td>' +
                '<td style="padding:0"><b>{point.percentage:.1f}%</b></td></tr>',
            footerFormat: '</table>',
            useHTML: true
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.percentage:.1f} %'
                },
                showInLegend: true,

                depth: 35,
                dataLabels: {
                    formatter: function() {
                        if (this.percentage != 0) return Math.round(this.percentage) + '%';
                    },
                    distance: -40,
                    style: {
                        color: 'white',
                        fontSize: '14px'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Rasio Perbandingan',
            data: [
                ['Complete', 150000],
                ['Non Complete', 63000],
            ],
            colors: ['#4B8673', '#354259']
        }]
    });
</script>

<script type="text/javascript">
    Highcharts.chart('chart2', {
        chart: {
            type: 'area'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Waktu Rata - Rata',
                style: {
                    fontFamily: 'glory',
                }
            }
        },
        plotOptions: {
            area: {
                fillOpacity: 0.5
            }
        },
        credits: {
            enabled: false
        },
        tooltip: {
            headerFormat: '<span style="font-size:12px; fontFamily:glory;">{point.key}</span><table>',
            pointFormat: '<tr><td style="fontFamily:glory;">{series.name} : </td>' +
                '<td style="fontFamily:glory;"><b>{point.y:.0f} Hari</b></td></tr>',
            footerFormat: '</table>',
            useHTML: true
        },
        series: [{
            name: 'Waktu Rata - Rata',
            data: [10, 20, 30, 10, 20, 30],
            color: '#147AD6',
            fillColor: 'rgba(99, 161, 255, 0.329)',
            lineColor: '#147AD6'
        }]
    });
</script>
@endsection