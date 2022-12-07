@extends('layouts.master')
@section('title', 'BMTI - Edit Data Keahlian')
@section('content')

<style>
    @media only screen and (min-width: 400px) and (max-width: 767px) {
    .marginResponsive {
        margin-top: 25px;
    }
    .img-galeria {
        display:block;
        margin-left:auto;
        margin-right:auto;
    }
}
</style>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin marginResponsive">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Edit Komptensi Keahlian') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('dataKeahlian.update', ['id'=>$keahlian->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="inputid_kompetensi" class="form-label">Kategori Kompetensi</label>

                            <select type="text" name="id_kompetensi" class="form-control">
                                @foreach($kompetensi as $row)
                                <option value="{{$row->id}}" {{ ($row->id == $keahlian->id_kompetensi ? 'selected' : '') }}>{{
                                $row->nama_kompetensi}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputjudul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{$keahlian->judul}}">
                        </div>
                        <div class="mb-3">
                            <label for="inputfile_content" class="form-label">Materi</label>
                            <textarea type="text" name="materi" class="ckeditor form-control"
                                height="200">{{$keahlian->materi}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inputfile_content" class="form-label">Gambar Banner</label>
                            <div class="mb-2">
                                <img class="img-galeria" src="{{asset('images/galeria/'.$keahlian->gambar_banner)}}" width="300"
                                    height="250" />
                            </div>
                            <input type="hidden" name="gambar_banner_old" value="{{$keahlian->gambar_banner}}" class="form-control">
                            <input type="file" name="gambar_banner_new" class="form-control"
                                accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <div class="mb-3">
                            <label for="inputfile_content" class="form-label">File Content</label>
                            <div>
                                <a href="">{{$keahlian->file_content}}</a>
                            </div>
                            <input type="hidden" name="file_content_old" value="{{$keahlian->file_content}}"
                                class="form-control">
                            <input type="file" name="file_content_new" class="form-control" accept=".pdf">
                        </div>
                        <div class="mb-3">
                            <label for="inputvideo_content" class="form-label">Video Content</label>
                            <div>
                                <a href="">{{$keahlian->video_content}}</a>
                            </div>
                            <input type="hidden" name="video_content_old" value="{{$keahlian->video_content}}"
                                class="form-control">
                            <input type="file" name="video_content_new" class="form-control"
                                accept="video/mp4, video/webm">
                        </div>
                        <div class="mb-3">
                            <label for="inputauthor" class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{$keahlian->author}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.ckeditor').ckeditor();
});
</script>
@endsection