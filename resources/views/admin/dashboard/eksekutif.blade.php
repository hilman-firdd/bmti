@extends('layouts.master')
@section('title', 'BMTI - Dashboard Eksekutif')
@section('custom-css')

<style>
/* Dashboard Eksekutif */

.cardSiswa {
    padding: 20px;
    border-radius: 5px;
    font-family: "glory";
    background-color: #6D8B74;
    color: white;
    height: 160px;
    width: 100%;
    overflow: hidden;
}

.cardSiswa h6 {
    font-size: 15px;
    font-weight: 600;
}

.cardSiswa h1 {
    font-weight: 600;
    margin: 0;
}

.cardSiswa span {
    font-size: 15px;
    font-weight: 600;
}

.cardGuru {
    padding: 20px;
    border-radius: 5px;
    font-family: "glory";
    background-color: #0E26FF;
    color: white;
    height: 160px;
    width: 100%;
    overflow: hidden;
}

.cardGuru h6 {
    font-size: 15px;
    font-weight: 600;
}

.cardGuru h1 {
    font-weight: 600;
    margin: 0;
}

.cardGuru span {
    font-size: 15px;
    font-weight: 600;
}

.cardPerusahaan {
    padding: 20px;
    border-radius: 5px;
    font-family: "glory";
    background-color: #FF7600;
    color: white;
    height: 160px;
    width: 100%;
    overflow: hidden;
}

.cardPerusahaan h6 {
    font-size: 15px;
    font-weight: 600;
}

.cardPerusahaan h1 {
    font-weight: 600;
    margin: 0;
}

.cardRasioGuruKependidikan span {
    font-size: 15px;
    font-weight: 600;
}

.cardRasioGuruKependidikan {
    font-family: "glory";
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardJenisPelatihan {
    font-family: "glory";
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardJenisPelatihan h6 {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: 20px;
}

.cardJenisPelatihan i {
    margin-right: 10px;
}

.cardKunjunganAplikasi {
    font-size: 12px;
    font-weight: 600;
    font-family: "glory";
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardKunjunganAplikasi h5 {
    font-size: 17px;
    font-weight: 600;
}

.cardKunjunganAplikasi i {
    margin-right: 10px;
}

.cardKelulusanPeserta {
    font-family: "glory";
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardKelulusanPeserta h6 {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: 20px;
}

.cardKelulusanPeserta i {
    margin-right: 10px;
}

@media only screen and (min-width: 400px) and (max-width: 991px) {

    .marginCard {
        margin-top: 20px;
    }
}

/* End Dashboard Eksekutif */
</style>

<script src="{{asset('admin/vendors/highchart/code/highcharts.js')}}"></script>
<script src="{{asset('admin/vendors/highchart/code/highcharts-3d.js')}}"></script>
<script src="../../code/modules/exporting.js"></script>
<script src="../../code/modules/export-data.js"></script>
<script src="../../code/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-10 col-lg-4 col-xl-4">
                    <div class="marginCard">
                        <div class="cardSiswa">
                            <div class="row">
                                <div class="col-12">
                                    <h6>Jumlah Seluruh Siswa Sekolah Kejuruan</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8 col-lg-7 col-xl-8">
                                    <h1>{{ $jmlSeluruhSiswa }}</h1>
                                    <span>Siswa</span>
                                </div>
                                <div class="mt-4 col-4">
                                    <img src="{{asset('guest/assets/images/peserta-eksekutif.png')}}" width="90px"
                                        height="90px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-10 col-lg-4 col-xl-4">
                    <div class="marginCard">
                        <div class="cardGuru">
                            <div class="row">
                                <div class="col-12">
                                    <h6>Jumlah Seluruh Guru dan Tenaga kependidikan kejuruan</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 col-lg-7 col-xl-8">
                                    <h1>{{$jmlGuruTng}}</h1>
                                    <span>Guru</span>
                                </div>
                                <div class="mt-2 col-4">
                                    <img src="{{asset('guest/assets/images/guru-eksekutif.png')}}" width="90px"
                                        height="90px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-10 col-lg-4 col-xl-4">
                    <div class="marginCard">
                        <div class="cardPerusahaan">
                            <div class="row">
                                <div class="col-12">
                                    <h6>Jumlah Perusahaan yang tercatat sebagai mitra industri</h6>
                                </div>
                                <div class="col-8 col-lg-7 col-xl-8">
                                    <h1>{{ $jmlPerusahaan }}</h1>
                                    <span>Perusahaan</span>
                                </div>
                                <div class="mt-2 col-4">
                                    <img src="{{asset('guest/assets/images/perusahaan-eksekutif.png')}}" width="90px"
                                        height="90px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 row justify-content-center">
                <div class="col-12 col-sm-10 col-md-5 col-lg-6 col-xl-6">
                    <div class="p-3 text-center bg-white rounded shadow h-100">
                        <div class="cardRasioGuruKependidikan">
                            <figure class="highcharts-figure">
                                <div id="chart1" style="height:440px"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-5 col-lg-6 col-xl-6">
                    <div class="marginCard">
                        <div class="p-3 bg-white rounded shadow h-100">
                            <div class="cardJenisPelatihan">
                                <h6><i class="fa-solid fa-chart-simple"></i>Peserta Berdasarkan Jenis Pelatihan</h6>
                                <figure class="highcharts-figure">
                                    <div id="chart2"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 row justify-content-center">
                <div class="col-12 col-sm-10 col-md-5 col-lg-6 col-xl-6">
                    <div class="p-3 bg-white rounded shadow h-100">
                        <div class="cardKunjunganAplikasi">
                            <h5><i class="fa-solid fa-chart-simple"></i>Kunjungan Aplikasi Berdasarkan Periode Waktu
                            </h5>
                            <div class="d-flex justify-content-between">
                                <div class="date-text">2 Maret 2022</div>
                                <div class="filter">
                                    <button class="btn btn-sm btn-primary">Bulan</button>
                                    <button class="btn btn-sm btn-primary">Tahun</button>
                                </div>
                            </div>
                            <figure class="highcharts-figure">
                                <div id="chart3"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-5 col-lg-6 col-xl-6">
                    <div class="marginCard">
                        <div class="p-3 bg-white rounded shadow h-100">
                            <div class="cardKelulusanPeserta">
                                <h6><i class="fa-solid fa-chart-simple"></i>Tren Kelulusan Peserta</h6>
                                <figure class="highcharts-figure">
                                    <div id="chart4" style="height:420px"></div>
                                </figure>
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
        text: 'Rasio Perbandingan Keikutsertaan Guru dan Tenaga Kependidikan',
        style: {
            fontFamily: 'glory',
        }
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
                distance: -70,
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
            ['Guru', {{ $jmlGuru }}],
            ['Tenaga Kependidikan', {{ $keikutsertaan }}],
        ],
        colors: ['#82954B', '#7C3E66']
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    credits: {
        enabled: false
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mey', 'Jun', 'Jul'],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Pelatihan',
            style: {
                fontFamily: 'glory',
            }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px; fontFamily:glory;">{point.key}</span><table>',
        pointFormat: '<tr><td style="fontFamily:glory; padding:0;">{series.name} :</td>' +
            '<td><b>{point.y:.0f} Kelas</b></td></tr>',
        footerFormat: '</table>',
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'Pelatihan Mandiri',
        data: [45, 36, 90, 28, 70, 30, 10],
        color: "#FFD01C",
    }, {
        name: 'Pelatihan Terbimbing',
        data: [35, 30, 90, 28, 70, 30, 10],
        color: "#077DD9"
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('chart3', {
    chart: {
        type: 'area'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
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
        name: 'Pelatihan Mandiri',
        data: [10, 20, 10, 30, 20, 50, 30],
        color: "#5c3ac9",
        fillColor: 'rgba(153, 66, 252, 0.329)',
        lineColor: '#4521BB'
    }, {
        name: 'Pelatihan Terbimbing',
        data: [70, 40, 60, 50, 20, 30, 10],
        color: "#47ff26",
        fillColor: 'rgba(99, 255, 112, 0.329)',
        lineColor: '#31FF0D'
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('chart4', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    credits: {
        enabled: false
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mey', 'Jun', 'Jul'],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Pelatihan',
            style: {
                fontFamily: 'glory',
            }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px; fontFamily:glory;">{point.key}</span><table>',
        pointFormat: '<tr><td style="fontFamily:glory; padding:0;">{series.name} :</td>' +
            '<td><b>{point.y:.0f} Kelas</b></td></tr>',
        footerFormat: '</table>',
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'Pelatihan Mandiri',
        data: [45, 36, 90, 28, 70, 30, 10],
        color: "#A10035",
    }, {
        name: 'Pelatihan Terbimbing',
        data: [35, 30, 90, 28, 70, 30, 10],
        color: "#73777B"
    }]
});
</script>
@endsection