@extends('layouts.master-pembelajaran')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5 mb-5">
        <div id="pengantar" class="col-12 col-xl-7 text-pembelajaran">
            <h2>Kegiatan Pembelajaran 1</h2>
            <p>1. Mengukur dan Menggunakan Alat Ukur</p>
            <div class="video-materi">
                <video width="700" height="400" controls>
                    <source src="/videos/video.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        <div class="col-12 col-lg-2 col-xl-2">
            <div class="row justify-content-end">
                <div class="col-lg-12 col-xl-7">
                    <div class="button-hidden">
                        <img src="{{asset('guest/assets/images/collapse-right.png')}}" id="icon-pembelajaran"
                            style="width=20px; height:20px;" onclick="myFunction()" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="content-pembelajaran" class="col-12 content-pembelajaran">
                    <div class="pembelajaran text-center bg-white">
                        <span>Konten Pembelajaran</span>
                    </div>

                    @foreach($topiks as $tp)
                    <div class="pembelajaran-box bg-white">
                        <div class="row">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input">
                            </div>
                            <div class="col-8">
                                <a href="{{route('pembelajaran.topik',['id' => $pelatihan->id, 'topikId' => $tp->id])}}"
                                    style="text-decoration: none;"><span>{{$tp->judul}}</span></a>
                            </div>
                        </div>
                    </div>
                    @foreach($konten as $kt)
                    @if($kt->topik_id == $tp->id)
                    <div class="pembelajaran-box bg-white">
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input">
                            </div>
                            <div class="col-9">
                                <a href="{{route('pembelajaran.konten',['id' => $pelatihan->id, 'topikId' => $tp->id, 'kontenId' => $kt->id])}}"
                                    style="text-decoration: none;"><span>{{$kt->judul}}</span></a>
                            </div>
                            <div class="col-1">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    @foreach($topikQuiz as $tq)
                    @if($tq->topik_id == $tp->id)
                    <div id="content" class="pembelajaran-box bg-white">
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input">
                            </div>
                            <div class="col-9">
                                <a href="{{route('pembelajaran.quiz',['id' => $pelatihan->id, 'topikId' => $tq->topik_id, 'quizId' => $tq->quiz_id])}}"
                                    style="text-decoration: none;">
                                    <span>{{$tq->judul}}</span>
                                </a>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                    <div class="pembelajaran-bar text-center bg-white">
                        <p class="mt-4">Proses Pembelajaran</p>
                        <figure class="highcharts-figure">
                            <div id="bar" style="height: 250px; margin:auto;"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('admin/vendors/highchart/code/highcharts.js')}}"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
Highcharts.chart('bar', {
    chart: {
        type: 'pie'
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
        pointFormat: '<td style="padding:0;"><b>{point.percentage:.1f}%</b></td></tr>',
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
                distance: -22,
                style: {
                    color: 'white',
                    fontSize: '14px'
                }
            }
        }
    },
    series: [{
        innerSize: '50%',
        data: [
            ['Complete', 10],
            ['Non Complete', 8],
        ],
        colors: ['#2289FF', '#E0DECA']
    }]
});
</script>

<script>
function myFunction() {
    if (document.getElementById("icon-pembelajaran").src == "{{asset('guest/assets/images/collapse-right.png')}}") {
        document.getElementById("icon-pembelajaran").src = "{{asset('guest/assets/images/collapse-left.png')}}";
    } else {
        document.getElementById("icon-pembelajaran").src = "{{asset('guest/assets/images/collapse-right.png')}}";
    }
    var x = document.getElementById("content-pembelajaran");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function myFunction1() {
    if (document.getElementById("icon-pembelajaran-1").src == "{{asset('guest/assets/images/collapse-down.png')}}") {
        document.getElementById("icon-pembelajaran-1").src = "{{asset('guest/assets/images/collapse-up.png')}}";
    } else {
        document.getElementById("icon-pembelajaran-1").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    }
    $('#materi-1').attr('class', '');
    var x = document.getElementById("materi-1");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function myFunction2() {
    if (document.getElementById("icon-pembelajaran-2").src == "{{asset('guest/assets/images/collapse-down.png')}}") {
        document.getElementById("icon-pembelajaran-2").src = "{{asset('guest/assets/images/collapse-up.png')}}";
    } else {
        document.getElementById("icon-pembelajaran-2").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    }
    $('#materi-2').attr('class', '');
    var x = document.getElementById("materi-2");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function myFunction3() {
    if (document.getElementById("icon-pembelajaran-3").src == "{{asset('guest/assets/images/collapse-down.png')}}") {
        document.getElementById("icon-pembelajaran-3").src = "{{asset('guest/assets/images/collapse-up.png')}}";
    } else {
        document.getElementById("icon-pembelajaran-3").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    }
    $('#materi-3').attr('class', '');
    var x = document.getElementById("materi-3");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function myFunction4() {
    if (document.getElementById("icon-pembelajaran-4").src == "{{asset('guest/assets/images/collapse-down.png')}}") {
        document.getElementById("icon-pembelajaran-4").src = "{{asset('guest/assets/images/collapse-up.png')}}";
    } else {
        document.getElementById("icon-pembelajaran-4").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    }
    $('#materi-4').attr('class', '');
    var x = document.getElementById("materi-4");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function myFunction5() {
    if (document.getElementById("icon-pembelajaran-5").src == "{{asset('guest/assets/images/collapse-down.png')}}") {
        document.getElementById("icon-pembelajaran-5").src = "{{asset('guest/assets/images/collapse-up.png')}}";
    } else {
        document.getElementById("icon-pembelajaran-5").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    }
    $('#materi-5').attr('class', '');
    var x = document.getElementById("materi-5");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function myFunction6() {
    if (document.getElementById("icon-pembelajaran-6").src == "{{asset('guest/assets/images/collapse-down.png')}}") {
        document.getElementById("icon-pembelajaran-6").src = "{{asset('guest/assets/images/collapse-up.png')}}";
    } else {
        document.getElementById("icon-pembelajaran-6").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    }
    $('#materi-6').attr('class', '');
    var x = document.getElementById("materi-6");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function myFunction7() {
    if (document.getElementById("icon-pembelajaran-7").src == "{{asset('guest/assets/images/collapse-down.png')}}") {
        document.getElementById("icon-pembelajaran-7").src = "{{asset('guest/assets/images/collapse-up.png')}}";
    } else {
        document.getElementById("icon-pembelajaran-7").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    }
    $('#materi-7').attr('class', '');
    var x = document.getElementById("materi-7");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
</script>
@endsection