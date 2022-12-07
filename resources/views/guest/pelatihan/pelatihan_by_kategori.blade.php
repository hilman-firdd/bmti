@extends('layouts.master_front')
@section('title', 'Pelatihan Mandiri - '.$pelatihan->judul)

@section('content')
<div class="model-3d">
    <div class="container">
        <div class="row">
            <div class="text-tpgm">
                <div class="col-12">
                    <p>{{$pelatihan->judul}}</p>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <div class="col-1 img-account">
                <img src="/images/account.png" width="30px" height="30px" />
            </div>
            <div class="col-4 col-md-5 col-lg-3 col-xl-3 account">
                <span>By {{$pelatihan->author}}
                    <p>Last Update Sept 15, 2022</p>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-5 col-xl-5">
                <div class="image-tpgm">
                    <img src="{{asset('/images/pelatihan/'.$pelatihan->gambar)}}" width="500px" height="350px" />
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-6">
                <div class="line-left">
                    <div class="course">
                        <div class="row">
                            <div class="col-12">
                                <p>Course & Topics</p>
                                <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 col-xl-8">
                                <p>Course Home</p>
                            </div>
                            <div class="col-5 col-xl-4">
                                <img src="{{asset('guest/assets/images/collapse-up.png')}}" id="icon-pelatihan-1"
                                    style="width:20px; height:20px;" onclick="myFunction1()" /> &nbsp;
                                <span>Collapse All</span>
                            </div>
                            <hr style="width:96%; margin-left:12px;" />
                        </div>
                        <div id="content-pelatihan-1">
                            @foreach($topiks as $tp)
                            <div class="row">
                                <div class="col-12">
                                    <input class="pengantar" type="checkbox" />
                                    <a href="{{route('pembelajaran.topik',['id' => $pelatihan->id, 'topikId' => $tp->id])}}"
                                        style="text-decoration: none;"><span> &nbsp;{{$tp->judul}}</span></a>
                                    <hr />
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-4">
        <div class="col-8 col-lg-9 col-xl-10 content">
            <h2>Course Content</h2>
        </div>
        <!-- <div class="col-4 col-lg-2 col-xl-2 icon-mandiri mt-5">
            <img src="{{asset('guest/assets/images/collapse-up.png')}}" id="icon-pelatihan-2"
                style="width:20px; height:20px;" onclick="myFunction2()" /> &nbsp;
            <span>Collapse All</span>
        </div> -->
    </div>
    <div id="content-pelatihan-2" class="content">
        @foreach($topiks as $tp)
        <div class="bg-box shadow bg-white rounded mt-1">
            <div class="row">
                <div class="col-8 col-xl-10">
                    <input type="checkbox" />
                    <a href="{{route('pembelajaran.topik',['id' => $pelatihan->id, 'topikId' => $tp->id])}}"
                        style="text-decoration: none; top:12px; left:15px;"><span>{{$tp->judul}}</span></a>
                </div>
                <!-- <div class="col-4 col-xl-2 collapse-select">
                    <img src="{{asset('guest/assets/images/collapse-up.png')}}" id="icon-pelatihan-3"
                        style="width:20px; height:20px;" onclick="myFunction3()" /> &nbsp;
                    <span>Collapse</span>
                </div> -->
            </div>
        </div>

        <div id="content-pelatihan-3">
            @foreach($konten as $kt)
            @if($kt->topik_id == $tp->id)
            <div class="bg-box shadow bg-white rounded mt-1">
                <img src="{{asset('guest/assets/images/lesson.png')}}" width="30px" height="30px" />
                <a
                    href="{{route('pembelajaran.konten',['id' => $pelatihan->id, 'topikId' => $tp->id, 'kontenId' => $kt->id])}}"><span>{{$kt->judul}}</span></a>
            </div>
            @endif
            @endforeach
            
            @foreach($topikQuiz as $tq)
            @if($tq->topik_id == $tp->id)
            <div class="bg-box shadow bg-white rounded mt-1">
                <img src="{{asset('guest/assets/images/tes-awal.png')}}" width="30px" height="30px" />
                <a
                    href="{{route('pembelajaran.quiz',['id' => $pelatihan->id, 'topikId' => $tq->topik_id, 'quizId' => $tq->quiz_id])}}"><span>{{$tq->judul}}</span></a>
            </div>
            @endif
            @endforeach
        </div>
        </span>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="row mt-5">
        @foreach($data as $data)
        <div class="col-12 col-md-4 col-xl-4">
            <div class="card-pel shadow">
                <p class="title-free">Free</p>
                <img class="card-img-top" src="{{asset('/images/pelatihan/'.$data->gambar)}}" alt="Card image cap"
                    width="360px" height="200px" />
                <div class="card-body text-center">
                    <h2 class="card-text">{{$data->judul}}</h2>
                    <a href="{{route('pelatihan.detail', ['id'=>$data->id])}}"><button type="button"
                            class="btn-pel btn-primary">Lihat Selengkapnya...</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script>
function myFunction1() {
    if (document.getElementById("icon-pelatihan-1").src ==
        "{{asset('guest/assets/images/collapse-up.png')}}") {
        document.getElementById("icon-pelatihan-1").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    } else {
        document.getElementById("icon-pelatihan-1").src =
            "{{asset('guest/assets/images/collapse-up.png')}}";
    }
    var x = document.getElementById("content-pelatihan-1");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function myFunction2() {
    if (document.getElementById("icon-pelatihan-2").src ==
        "{{asset('guest/assets/images/collapse-up.png')}}") {
        document.getElementById("icon-pelatihan-2").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    } else {
        document.getElementById("icon-pelatihan-2").src =
            "{{asset('guest/assets/images/collapse-up.png')}}";
    }
    var x = document.getElementById("content-pelatihan-2");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function myFunction3() {
    if (document.getElementById("icon-pelatihan-3").src ==
        "{{asset('guest/assets/images/collapse-up.png')}}") {
        document.getElementById("icon-pelatihan-3").src = "{{asset('guest/assets/images/collapse-down.png')}}";
    } else {
        document.getElementById("icon-pelatihan-3").src =
            "{{asset('guest/assets/images/collapse-up.png')}}";
    }
    var x = document.getElementById("content-pelatihan-3");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
@endsection