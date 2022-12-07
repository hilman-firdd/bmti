@extends('layouts.master')
@section('title', 'Pelatihan - '.$pelatihan->judul)
@section('custom-css')
<style>
.list-group li {
    border-left: none;
    border-right: none;
}

@media only screen and (min-width: 400px) and (max-width: 991px) {
    .img-pelatihan {
        text-align: center;
    }

    .img-pelatihan img {
        width: 400px;
        height: 300px;
    }
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="mt-3 mb-3 row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="p-2 bd-highlight">
                                <h2 style="font-family:glory; font-size:30px;">{{$pelatihan->judul}}</h2>

                            </div>
                            <div class="p-2 ms-auto bd-highlight">
                                @if($checkEnroll == false)
                                <a class="btn btn-lg btn-primary"
                                    href="{{route('peserta.pelatihan.enroll', [$pelatihan->id])}}"
                                    style="font-family:glory;">Daftar Pelatihan</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 img-pelatihan">
                            <img class="rounded" src="{{asset('/images/pelatihan/'.$pelatihan->gambar)}}" width="600px"
                                height="350px" />
                        </div>
                        <div class="col-xl-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="font-family:glory; font-size:16px;"><b>Kursus &
                                        Topik</b></li>
                            </ul>
                            @foreach($topiks as $tp)
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-start">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input"
                                            style="margin-top:6px;">
                                        <a href="{{route('pembelajaran.topik',['id' => $pelatihan->id, 'topikId' => $tp->id])}}"
                                            style="text-decoration:none; color:black; font-family:glory; font-size:14px; margin-left:5px;">{{$tp->judul}}</a>
                                    </label>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="card-title" style="font-family:glory; font-size:20px;">Detail Konten Pelatihan
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($topiks as $tp)
                        <div class="mt-1 bg-white rounded shadow bg-box">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-start">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="dapatDiUlang" value="1" class="form-check-input"
                                            style="margin-top:6px;">
                                        <a href="{{route('pembelajaran.topik',['id' => $pelatihan->id, 'topikId' => $tp->id])}}"
                                            style="text-decoration:none; color:black; font-family:glory; font-size:16px; margin-left:5px;"><span>{{$tp->judul}}</span></a>
                                    </label>
                                </li>
                            </ul>
                            @foreach($konten as $kt)
                            @if($kt->topik_id == $tp->id)
                            <div class="margin-left: 10px;">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-start" style="padding-left: 30px">
                                        <label class="form-check-label">
                                            <img src="{{asset('guest/assets/images/lesson.png')}}" width="20px"
                                                height="20px" style="margin-top:-5px;" />
                                            <a href="{{route('pembelajaran.konten',['id' => $pelatihan->id, 'topikId' => $tp->id, 'kontenId' => $kt->id])}}"
                                                style="text-decoration:none; color:black; font-family:glory; font-size:16px; margin-left:5px;"><span>{{$kt->judul}}</span></a>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @endforeach
                            @foreach($topikQuiz as $tq)
                            @if($tq->topik_id == $tp->id)
                            <div>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-start" style="padding-left: 30px">
                                        <label class="form-check-label">
                                            <img src="{{asset('guest/assets/images/tes-awal.png')}}" width="20px"
                                                height="20px" style="margin-top:-5px;" />
                                            <a href="{{route('pembelajaran.quiz',['id' => $pelatihan->id, 'topikId' => $tq->topik_id, 'quizId' => $tq->quiz_id])}}"
                                                style="text-decoration:none; color:black; font-family:glory; font-size:16px; margin-left:5px;"><span>{{$tq->judul}}</span></a>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection