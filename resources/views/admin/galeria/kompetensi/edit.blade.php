@extends('layouts.master')
@section('title', 'BMTI - Edit Data Kompetensi')
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
                    <h4 class="card-title">{{ __('Edit Kompetensi') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('kompetensi.update', ['id'=>$data->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="inputnama_kompetensi" class="form-label">Nama Kompetensi</label>
                            <input type="text" name="nama_kompetensi" class="form-control" id="inputnama_kompetensi"
                                aria-describedby="emailHelp" value="{{ $data->nama_kompetensi }}">
                        </div>
                        <div class="mb-3">
                            <label for="inputnama_kompetensi" class="form-label">Kode Kompentensi</label>
                            <input type="text" name="kode" class="form-control" id="inputnama_kompetensi"
                                aria-describedby="emailHelp" value="{{ $data->kode }}">
                        </div>
                        <div class="mb-3">
                            <label for="inputdeskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="input_deskripsi"
                                aria-describedby="emailHelp" value="{{ $data->deskripsi }}">
                            <!-- <trix-editor input="body"></trix-editor> -->
                        </div>
                        <div class="mb-3">
                            <label for="inputgambar_banner" class="form-label">Gambar Banner</label>
                            <div class="mb-2">
                                <img class="img-galeria" src="{{asset('images/galeria/'.$data->gambar_banner)}}" width="300" height="250" />
                            </div>
                            <input type="hidden" name="gambar_banner_old" class="form-control"
                                value="{{ $data->gambar_banner }}">
                            <input type="file" name="gambar_banner_new" class="form-control"
                                accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();

});
</script>
@endsection