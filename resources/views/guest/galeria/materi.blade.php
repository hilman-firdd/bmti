@extends('layouts.master_front')
@section('title', 'Galeria - '.$data->judul)

@section('content')
<div class="teknik-permesinan">
    <div class="container">
        <div class="row">
            <div class="order-1 text-center col-12 text-kompetensi-2">
                <h1>{{$data->judul}}</h1>
                <img src="{{asset('images/galeria/'.$data->gambar_banner)}}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="text-kompetensi-2">
            {!!$data->materi!!}
        </div>
    </div>
    <div class="mb-5 row justify-content-center">
        <iframe src='{{asset('files/galeria/'.$data->file_content)}}' width='100%' height='500vh' frameborder='0'>This is an embedded <a target='_blank' href=''{{asset('files/galeria/'.$data->file_content)}}'>Microsoft Office</a> document, powered by <a target='_blank' href=''{{asset('files/galeria/'.$data->file_content)}}'>Office Online</a>.</iframe>
    </div>
    @if($data->video_content)
    <div class="row justify-content-center">
        <video width="320" height="240" controls>
            <source src="{{asset('videos/galeria/'.$data->video_content)}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    @endif

</div>


<script>

</script>

@endsection