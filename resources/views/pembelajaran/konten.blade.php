@extends('layouts.master-pembelajaran')
@section('title', 'BMTI - '.$data->judul)

@section('content')
<div class="container-fluid">
    <div class="mt-5 mb-5 row justify-content-center">
        <div class="col-12 col-lg-7 col-xl-7 materi-pembelajaran">
            <h1><b>{{$data->judul}}</b></h1>
            @if($data->materi)
            <p class="mt-3">
                {!!$data->materi!!}
            </p>
            @endif
            @if($data->file)
            <iframe src='{{asset('files/file_konten/'.$data->file)}}' width='100%' height='500vh' frameborder='0'>This is an embedded <a target='_blank' href=''{{asset('files/file_konten/'.$data->file)}}'>Microsoft Office</a> document, powered by <a target='_blank' href=''{{asset('files/file_konten/'.$data->file)}}'>Office Online</a>.</iframe>
            @endif
            <br />
            <hr />
            <div class="text-center row">
                <div class="col-4 prev-nav">
                    <a href="" class="btn-pembelajaran btn btn-primary">
                        <i class="fa-solid fa-angle-left" style="margin-left: -10px;"></i>
                        <span style=" margin-left: 15px;">Previous Lesson</span>
                    </a>
                </div>
                <div class="col-4">
                    <button class="btn-pembelajaran btn btn-primary">
                        <span><a href="{{route('pembelajaran.konten.tandaiSelesai', ['id' => $pelatihanId, 'topikId' => $topikId, 'kontenId' => $kontenId])}}"
                                style="text-decoration:none; color:white;">MARK COMPLETE</a></span>
                        <i class="fa-solid fa-check" style="margin-left:5px;"></i>
                    </button>
                    <a href="{{ url('peserta/pelatihan/by/enrolled') }}" style="font-size: 14px; font-family:glory; text-decoration: none;">
                        <p>Back to Course</p>
                    </a>
                </div>
                <div class="col-4 next-nav">
                    <a href="" class="btn-pembelajaran btn btn-primary">
                        <span style="margin-left:20px;">Next Lesson</span>
                        <i class="fa-solid fa-angle-right" style="margin-left:20px;"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-xl-2">
            <div class="row justify-content-end">
                <div class="col-lg-10 col-xl-7">
                    <div class="button-hidden">
                        <img src="{{asset('guest/assets/images/collapse-right.png')}}" id="icon-pembelajaran"
                            style="width:20px; height:20px;" onclick="myFunction()" />
                    </div>
                </div>
            </div>
            <div class="row nav-tree">
                <div id="content-pembelajaran" class="col-12 content-pembelajaran">
                    <div class="text-center bg-white pembelajaran">
                        <span>Konten Pembelajaran</span>
                    </div>

                    @foreach($topiks as $tp)
                    <div class="bg-white pembelajaran-box">
                        <div class="row">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input"
                                    disabled="disabled">
                            </div>
                            <div class="col-8 link">
                                <a href="{{route('pembelajaran.topik',['id' => $pelatihan->id, 'topikId' => $tp->id])}}"
                                    style="text-decoration: none;"><span>{{$tp->judul}}</span></a>
                            </div>
                        </div>
                    </div>
                    @foreach($konten as $kt)
                    @if($kt->topik_id == $tp->id)
                    <div class="bg-white pembelajaran-box">
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input"
                                    <?php if ($kontenId == $kt->id) echo "checked"; ?> disabled="disabled">
                            </div>
                            <div class="col-9 link">
                                <a href="{{route('pembelajaran.konten',['id' => $pelatihan->id, 'topikId' => $tp->id, 'kontenId' => $kt->id])}}"
                                    style="text-decoration: none;"><span>{{$kt->judul}}</span></a>
                            </div>
                            <div class="col-1">
                                @if($kt->status == 1)
                                <i class="fa-solid fa-circle-check"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    @foreach($topikQuiz as $tq)
                    @if($tq->topik_id == $tp->id)
                    <div id="content" class="bg-white pembelajaran-box">
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input"
                                    disabled="disabled">
                            </div>
                            <div class="col-9 link">
                                <a href="{{route('pembelajaran.quiz',['id' => $pelatihan->id, 'topikId' => $tq->topik_id, 'quizId' => $tq->quiz_id])}}"
                                    style="text-decoration: none;">
                                    <span>{{$tq->judul}}</span>
                                </a>
                            </div>
                            <div class="col-1">
                                @if($tq->status == 1)
                                <i class="fa-solid fa-circle-check"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                    <div class="text-center bg-white pembelajaran-bar">
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

<!-- menu -->
<div id="menu" class="d-none">
    <div class="menu-container">
        <div class="container">
            <div class="d-flex justify-content-end">
                <div class="col-2">
                    <div class="icon-menu-hover" onclick="onClickCloseMenu()"></div>
                </div>
            </div>
            <div class="row">
                <div class="text-center col-12 text-light text-header-menu">
                    <p>Pelatihan Saya</p>
                </div>
            </div>

            <div class="mt-2 row">
                <div class="col-12">
                    <div class="text-hover-pembelajaran-menu">
                        <div class="text-hover-menu">
                            <div class="row justify-content-center">
                                <div class="col-1">
                                    <a href="{{url('/dashboard')}}">
                                        <i class="fa-solid fa-house-chimney"></i>
                                    </a>
                                </div>
                                <div class="col-4 text-start">
                                    <a href="{{url('/dashboard')}}" class="btn-lg" role="button"
                                        aria-pressed="true">Dashboard</a>
                                </div>
                            </div>
                            <hr />
                            <div class="row justify-content-center">
                                <div class="col-1">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                                <div class="col-4 text-start">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class=" btn-lg" role="button" aria-pressed="true">Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 row nav-tree">
                <div class="col-12 content-pembelajaran-menu">
                    <div class="text-center bg-white pembelajaran">
                        <span>Konten Pembelajaran</span>
                    </div>

                    @foreach($topiks as $tp)
                    <div class="bg-white pembelajaran-box">
                        <div class="row">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input"
                                    disabled="disabled">
                            </div>
                            <div class="col-8 link">
                                <a href="{{route('pembelajaran.topik',['id' => $pelatihan->id, 'topikId' => $tp->id])}}"
                                    style="text-decoration: none;"><span>{{$tp->judul}}</span></a>
                            </div>
                        </div>
                    </div>
                    @foreach($konten as $kt)
                    @if($kt->topik_id == $tp->id)
                    <div class="bg-white pembelajaran-box">
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input"
                                    <?php if ($kontenId == $kt->id) echo "checked"; ?> disabled="disabled">
                            </div>
                            <div class="col-9 link">
                                <a href="{{route('pembelajaran.konten',['id' => $pelatihan->id, 'topikId' => $tp->id, 'kontenId' => $kt->id])}}"
                                    style="text-decoration: none;"><span>{{$kt->judul}}</span></a>
                            </div>
                            <div class="col-1">
                                @if($kt->status == 1)
                                <i class="fa-solid fa-circle-check"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    @foreach($topikQuiz as $tq)
                    @if($tq->topik_id == $tp->id)
                    <div id="content" class="bg-white pembelajaran-box">
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input"
                                    disabled="disabled">
                            </div>
                            <div class="col-9 link">
                                <a href="{{route('pembelajaran.quiz',['id' => $pelatihan->id, 'topikId' => $tq->topik_id, 'quizId' => $tq->quiz_id])}}"
                                    style="text-decoration: none;">
                                    <span>{{$tq->judul}}</span>
                                </a>
                            </div>
                            <div class="col-1">
                                @if($tq->status == 1)
                                <i class="fa-solid fa-circle-check"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endforeach

                    <div class="text-center bg-white pembelajaran-bar">
                        <p class="mt-4">Proses Pembelajaran</p>
                        <figure class="highcharts-figure">
                            <div id="bar2" style="height: 250px; margin:auto;"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end menu -->
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
            ['Complete', {{ $sumDonut }}],
            ['Non Complete', {{ $elseDonut }}],
        ],
        colors: ['#2289FF', '#E0DECA']
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('bar2', {
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
            ['Complete', {{ $sumDonutR }}],
            ['Non Complete', {{ $elseDonutR }}],
        ],
        colors: ['#2289FF', '#E0DECA']
    }]
});
</script>

<script>
function myFunction() {
    if (document.getElementById("icon-pembelajaran").src ==
        "{{asset('guest/assets/images/collapse-right.png')}}") {
        document.getElementById("icon-pembelajaran").src = "{{asset('guest/assets/images/collapse-left.png')}}";
    } else {
        document.getElementById("icon-pembelajaran").src =
            "{{asset('guest/assets/images/collapse-right.png')}}";
    }
    var x = document.getElementById("content-pembelajaran");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

var navLink = [];
$(".nav-tree .link").each(function(i) {
    navLink[i] = $(this).find("a").attr('href');
    console.log($(this).find("a").attr('href'));
});

console.log(navLink)

var currentLink = window.location.href;
var previousLink = "";
var nextLink = "";

for (var key in navLink) {
    if (navLink[key] === currentLink) {
        var currentKey = parseInt(key);
        break;
    }
}

console.log('Prev key : ' + (currentKey - 1))
console.log('Current key : ' + currentKey)
console.log('Next key : ' + (currentKey + 1))
console.log('Prev link : ' + navLink[(currentKey - 1)])
console.log('Current link : ' + currentLink)
console.log('Next link : ' + navLink[(currentKey + 1)])

$('.prev-nav a').attr('href', navLink[(currentKey - 1)])
$('.next-nav a').attr('href', navLink[(currentKey + 1)])
</script>
@endsection