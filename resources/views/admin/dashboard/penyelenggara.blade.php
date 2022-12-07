@extends('layouts.master')
@section('title', 'BMTI - Dashboard Penyelenggara')
@section('custom-css')

<style>
/* Dashboard Penyelenggara */

.cardKelasPelatihan {
    border-radius: 5px;
    font-family: "glory";
    background-color: #C34414;
    color: white;
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardKelasPelatihan h6 {
    font-size: 15px;
    font-weight: 600;
    margin: 0;
}

.cardKelasPelatihan h1 {
    font-weight: 600;
    margin: 0;
}

.cardKelasPelatihan span {
    font-size: 14px;
    font-weight: 600;
}

.cardPelatiahanTerselenggara {
    border-radius: 5px;
    font-family: "glory";
    background-color: #5534A5;
    color: white;
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardPelatiahanTerselenggara h6 {
    font-size: 15px;
    font-weight: 600;
    margin: 0;
}

.cardPelatiahanTerselenggara h1 {
    font-weight: 600;
    margin: 0;
}

.cardPelatiahanTerselenggara span {
    font-size: 14px;
    font-weight: 600;
}

.cardPelatihanBerjalan {
    border-radius: 5px;
    font-family: "glory";
    background-color: #205375;
    color: white;
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardPelatihanBerjalan h6 {
    font-size: 15px;
    font-weight: 600;
    margin: 0;
}

.cardPelatihanBerjalan h1 {
    font-weight: 600;
    margin: 0;
}

.cardPelatihanBerjalan span {
    font-size: 14px;
    font-weight: 600;
}

.cardPerbandinganKelas {
    font-family: "glory";
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardPesertaPelatihan {
    font-family: "glory";
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardPerbandinganPeserta {
    font-family: "glory";
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.cardPesertaSelesai {
    font-family: "glory";
    height: 100%;
    width: 100%;
    overflow: hidden;
}

@media only screen and (min-width: 400px) and (max-width: 991px) {
    .marginCard {
        margin-top: 20px;
    }
}

/* End Dashboard Penyelenggara */
</style>

<script src="{{asset('admin/vendors/highchart/code/highcharts.js')}}"></script>
<script src="{{asset('admin/vendors/highchart/code/highcharts-3d.js')}}"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="marginCard">
                <div class="cardKelasPelatihan">
                    <div class="shadow rounded p-3 h-100">
                        <div class="row">
                            <div class="col-12">
                                <h6>Kelas Pelatihan Tersedia :</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center mt-2">
                                <h1>{{$pelatihan}}</h1>
                                <span>Pelatihan Mandiri</span>
                            </div>
                            <div class="col-6 text-center mt-2">
                                <h1>0</h1>
                                <span>Pelatihan Terbimbing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="marginCard">
                <div class="cardPelatiahanTerselenggara">
                    <div class="shadow rounded p-3 h-100">
                        <div class="row">
                            <div class="col-12">
                                <h6>Pelatihan Terselengara :</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center mt-2">
                                <h1>{{$pelatihanT}}</h1>
                                <span>Pelatihan Mandiri</span>
                            </div>
                            <div class="col-6 text-center mt-2">
                                <h1>0</h1>
                                <span>Pelatihan Terbimbing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="marginCard">
                <div class="cardPelatihanBerjalan">
                    <div class="shadow rounded p-3 h-100">
                        <div class="row">
                            <div class="col-12">
                                <h6>Pelatihan Berjalan :</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center mt-2">
                                <h1>{{$pelatihanB}}</h1>
                                <span>Pelatihan Mandiri</span>
                            </div>
                            <div class="col-6 text-center mt-2">
                                <h1>0</h1>
                                <span>Pelatihan Terbimbing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
            <div class="shadow p-3 bg-white rounded text-center h-100">
                <div class="cardPerbandinganKelas">
                    <figure class="highcharts-figure">
                        <div id="chart1"></div>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
            <div class="marginCard">
                <div class="shadow p-3 bg-white rounded text-center h-100">
                    <div class="cardPesertaPelatihan">
                        <figure class="highcharts-figure">
                            <div id="chart2"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
            <div class="shadow p-3 bg-white rounded text-center h-100">
                <div class="cardPerbandinganPeserta">
                    <figure class="highcharts-figure">
                        <div id="chart3"></div>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
            <div class="marginCard">
                <div class="shadow p-3 bg-white rounded text-center h-100">
                    <div class="cardPesertaSelesai">
                        <figure class="highcharts-figure">
                            <div id="chart4"></div>
                        </figure>
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
        type: 'column'
    },
    title: {
        text: 'Perbandingan Kelas Tersedia dan Kelas Terselenggara',
        style: {
            fontFamily: 'glory',
        }
    },
    subtitle: {
        text: ''
    },
    credits: {
        enabled: false
    },
    xAxis: {
        categories: [
            'Pelatihan Mandiri',
            'Pelatihan Terbimbing',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Kelas',
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
        name: 'Kelas Tersedia',
        data: [{{$pelatihan}}, 0],
        color: "#70AD47",
    }, {
        name: 'Kelas Terselenggara',
        data: [{{$pelatihanT}}, 0],
        color: "#5B9BD5"
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('chart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Peserta Pelatihan dan Kelulusan',
        style: {
            fontFamily: 'glory',
        }
    },
    subtitle: {
        text: ''
    },
    credits: {
        enabled: false
    },
    xAxis: {
        categories: [
            'Pelatihan Mandiri',
            'Pelatihan Terbimbing',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Peserta',
            style: {
                fontFamily: 'glory',
            }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px; fontFamily:glory;">{point.key}</span><table>',
        pointFormat: '<tr><td style="fontFamily:glory; padding:0;">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Peserta</b></td></tr>',
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
        name: 'Peserta',
        data: [{{$pesertaP}}, 0],
        color: "#ED7D31"

    }, {
        name: 'Lulus',
        data: [{{$pelatihanT}}, 0],
        color: "#FFC000"
    }, {
        name: 'Gagal',
        data: [0, 0],
        color: "#70AD47"
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('chart3', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Perbandingan Peserta Terdaftar/Diundang dan Tuntas/Hadir',
        style: {
            fontFamily: 'glory',
        }
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['Pelatihan Mandiri', 'Pelatihan Terbimbing'],
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Peserta',
            align: 'high',
            style: {
                fontFamily: 'glory',
            }
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px; fontFamily:glory;">{point.key}</span><table>',
        pointFormat: '<tr><td style="fontFamily:glory; padding:0;">{series.name} : </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Kelas</b></td></tr>',
        footerFormat: '</table>',
        useHTML: true
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'bottom',
        x: -10,
        y: 15,
        floating: true,
        borderWidth: 1,
        borderRadius: 7,
        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Tuntas / Hadir',
        data: [{{$pesertaT}}, 0],
        color: "#A5A5A5"
    }, {
        name: 'Terdaftar / Diundang',
        data: [{{$pesertaU}}, 0],
        color: "#4472C4"
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('chart4', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Pelatihan Selesai',
        style: {
            fontFamily: 'glory',
        }
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['Pelatihan Mandiri', 'Pelatihan Terbimbing'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Peserta',
            align: 'high',
            style: {
                fontFamily: 'glory',
            }
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px; fontFamily:glory;">{point.key}</span><table>',
        pointFormat: '<tr><td style="fontFamily:glory; padding:0;">{series.name} : </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Kelas</b></td></tr>',
        footerFormat: '</table>',
        useHTML: true
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'bottom',
        x: -10,
        y: 15,
        floating: true,
        borderWidth: 1,
        borderRadius: 7,
        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [ {
        name: 'Selesai',
        data: [{{$pelatihanT}}, 0],
        color: "#809A6F"
    }]
});
</script>

@endsection