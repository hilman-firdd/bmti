@extends('layouts.master')
@section('title', 'BMTI - Create Data Keahlian')
@section('content')

<style>
    @media only screen and (min-width: 400px) and (max-width: 767px) {
    .marginResponsive {
        margin-top: 25px;
    }
}
</style>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin marginResponsive">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Kompetensi Keahlian') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('dataKeahlian.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputid_kompetensi" class="form-label">Kategori Komptensi</label>
                            <select type="text" name="id_kompetensi" class="form-control" required>
                                <option value="">-</option>
                                @foreach($data as $row)
                                <option value="{{$row->id}}">{{$row->nama_kompetensi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputjudul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputfile_content" class="form-label">Materi</label>
                            <textarea type="text" name="materi" class="ckeditor form-control" height="200" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inputfile_content" class="form-label">Gambar Banner</label>
                            <input type="file" name="gambar_banner" class="form-control" required accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <div class="mb-3">
                            <label for="inputfile_content" class="form-label">File Content</label>
                            <input type="file" name="file_content" class="form-control" required accept=".pdf">
                        </div>
                        <div class="mb-3">
                            <label for="inputvideo_content" class="form-label">Video Content</label>
                            <input type="file" name="video_content" class="form-control" accept="video/mp4, video/webm">
                        </div>
                        <div class="mb-3">
                            <label for="inputauthor" class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" required>
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