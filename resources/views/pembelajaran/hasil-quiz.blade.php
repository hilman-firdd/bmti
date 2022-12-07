@extends('layouts.master-pembelajaran')

@section('custom-css')
<style>
    .form-check {
        padding-left: 50px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="mt-5 mb-5 row justify-content-center">
        <div class="col-12 col-lg-7 col-xl-7">
            <div>
                <h1>{{$dataQuiz->judul}}</h1>
                <p class="mt-4">{{$dataQuiz->deskripsi}}</p>
                <h4>Hasil Penilaian</h4>
                <p>{{$counterJawabanBenar}} dari {{$totalSoal}} Pertanyaan terjawab dengan benar . Anda mendapatkan score <b>{{$nilaiAkhir}}</b></p>
                <p>Waktu Pengerjaan : 00:10:32</p>
                <h4>Testimoni</h4>
                <div class="mt-4 mb-4 row">
                    <div class="text-center col-md-12 justify-content-center">
                        <button id="pratinjau" class="btn btn-sm btn-primary" style="margin-right: 10px; font-family:glory;">Pratinjau Pertanyaan</button>
                        <a href="/pelatihan-mandiri/{{  $pelatihan->id }}/topik/{{ $topikId }}/quiz/{{ $quizId }}" class="btn btn-sm btn-primary" style="margin-left: 10px; font-family:glory;">Ulang Quiz</a>
                        @if($kursusPesertaId->sertifikat_url_path)
                        <a href="{{ asset($kursusPesertaId->sertifikat_url_path.$kursusPesertaId->sertifikat_file_name )}}" download type="application/octet-stream" class="btn btn-sm btn-primary" style="margin-left: 10px; font-family:glory;">Download Sertifikat</a>
                        @endif
                    </div>
                </div>
                <form action="{{route('pembelajaran.submit.testimoni', ['pel' => $pelatihan->id, 'topik' => $topikId, 'quiz' => $quizId ])}}" method="post">
                    @csrf
                    <div class="mt-4 mb-4 row">
                        <div class="col-md-12">
                            <input type="hidden" name="kursusPesertaId" value="{{$kursusPesertaId->id}}">
                            <input type="hidden" name="pesertaId" value="{{$kursusPesertaId->peserta_id}}">
                            <input type="hidden" name="namaPeserta" value="{{auth()->user()->name}}">
                            <input type="hidden" name="sekolahPeserta" value="{{$peserta->asal_sekolah}}">
                            <input type="hidden" name="pelatihanId" value="{{$pelatihan->id}}">
                            <input type="hidden" name="pelatihanNama" value="{{$pelatihan->judul}}">
                            <textarea class="form-control" name="testimoni" id="" cols="50" rows="10"></textarea>
                        </div>
                        <div class="mt-4 mb-4 row">
                            <div class="col-md-12">
                                <button type="submit" onclick="return confirm('Terimakasih Anda telah menyelesaikan pelatihan')" id="pratinjau" class="btn btn-sm btn-primary" style="margin-right: 10px; font-family:glory;">Kirim Testimoni</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="list-quiz">
                <?php $no = 1; ?>
                <form id="form-kuis" action="{{route('pembelajaran.quiz.tandaiSelesai', ['id' => $pelatihanId, 'topikId' => $topikId, 'quizId' => $quizId])}}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach($pertanyaan as $prt)
                    <div class="mt-4 quiz">
                        <p><?php echo $no++; ?>. {{$prt->pertanyaan}}</p>
                        <div class="form-check" style="padding-left: 40px;">
                            <input class="form-check-input" type="radio" name="jawaban[{{$prt->id}}][benar]" value="{{$prt->pilihan_a}}" class="form-check-input">
                            <label class="form-check-label" for="flexRadioDefault">{{$prt->pilihan_a}}</label>
                        </div>
                        <div class="form-check" style="padding-left: 40px;">
                            <input class="form-check-input" type="radio" name="jawaban[{{$prt->id}}][benar]" value="{{$prt->pilihan_b}}" class="form-check-input">
                            <label class="form-check-label" for="flexRadioDefault">{{$prt->pilihan_b}}</label>
                        </div>
                        <div class="form-check" style="padding-left: 40px;">
                            <input class="form-check-input" type="radio" name="jawaban[{{$prt->id}}][benar]" value="{{$prt->pilihan_c}}" class="form-check-input">
                            <label class="form-check-label" for="flexRadioDefault">{{$prt->pilihan_c}}</label>
                        </div>
                        <div class="form-check" style="padding-left: 40px;">
                            <input class="form-check-input" type="radio" name="jawaban[{{$prt->id}}][benar]" value="{{$prt->pilihan_d}}" class="form-check-input">
                            <label class="form-check-label" for="flexRadioDefault">{{$prt->pilihan_d}}</label>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-4 mb-4 quiz">
                        <div class="form btn-finish">
                            <button type="submit" class="btn btn-md btn-primary">Selesai</button>
                        </div>
                    </div>
                </form>
                <br />
                <hr />
                <div id="navigation" class="text-center row">
                    <div class="col-4 prev-nav">
                        <a href="" class="btn-pembelajaran btn btn-primary">
                            <i class="fa-solid fa-angle-left" style="  margin-left: -10px;"></i>
                            <span style=" margin-left: 15px;">Previous Lesson</span>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="" style="font-size: 14px; font-family:glory; text-decoration: none;">
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
        </div>

        <div class="col-12 col-lg-2 col-xl-2">
            <div class="row justify-content-end">
                <div class="col-lg-12 col-xl-7">
                    <div class="button-hidden">
                        <img src="{{asset('guest/assets/images/collapse-right.png')}}" id="icon-pembelajaran" style="width:20px; height:20px;" onclick="myFunction()" />
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
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input" disabled="disabled">
                            </div>
                            <div class="col-8 link">
                                <a href="{{route('pembelajaran.topik',['id' => $pelatihan->id, 'topikId' => $tp->id])}}" style="text-decoration: none;"><span>{{$tp->judul}}</span></a>
                            </div>
                        </div>
                    </div>
                    @foreach($konten as $kt)
                    @if($kt->topik_id == $tp->id)
                    <div class="bg-white pembelajaran-box">
                        <div class="row justify-content-center">
                            <div class="col-1">
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input" disabled="disabled">
                            </div>
                            <div class="col-9 link">
                                <a href="{{route('pembelajaran.konten',['id' => $pelatihan->id, 'topikId' => $tp->id, 'kontenId' => $kt->id])}}" style="text-decoration: none;"><span>{{$kt->judul}}</span></a>
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
                                <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input" <?php if ($quizId == $tq->quiz_id) echo "checked"; ?> disabled="disabled">
                            </div>
                            <div class="col-9 link">
                                <a href="{{route('pembelajaran.quiz',['id' => $pelatihan->id, 'topikId' => $tq->topik_id, 'quizId' => $tq->quiz_id])}}" style="text-decoration: none;">
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

@endsection @section('script')
<script src="{{asset('admin/vendors/highchart/code/highcharts.js')}}"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>

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

<script>
    $('#list-quiz').hide();
    $('#pratinjau').click(function() {
        $('#list-quiz').show();
        $('#navigation').hide();
        $('.btn-finish').hide();
    });

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

<script>
    function mulaiPenghitungWaktu() {
        var durasi = parseInt($('#durasi').val());
        var dt = new Date();
        dt.setMinutes(dt.getMinutes() + durasi);
        var countDownDate = dt.getTime()
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = hours + " : " +
                minutes + " : " + seconds;

            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
                alert('Waktu Habis');
                $('#form-kuis').submit();
            }
        }, 1000);
    }
</script>
@endsection