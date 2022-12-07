@extends('layouts.master')
@section('title', 'BMTI - Create Data Kompetensi')
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
                    <h4 class="card-title">{{ __('Data Kompetensi') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('kompetensi.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputnama_kompetensi" class="form-label">Nama Kompetensi</label>
                            <input type="text" name="nama_kompetensi" class="form-control" id="inputnama_kompetensi"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inputnama_kompetensi" class="form-label">Kode</label>
                            <input type="text" name="kode" class="form-control" id="inputnama_kompetensi"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputdeskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="input_deskripsi"
                                aria-describedby="emailHelp">
                            <!-- <trix-editor input="body"></trix-editor> -->
                        </div>
                        <div class="mb-3">
                            <label for="inputgambar_banner" class="form-label">Gambar Banner</label>
                            <input type="file" name="gambar_banner" class="form-control" id="inputgambar_banner"
                                aria-describedby="emailHelp" accept="image/jpg, image/jpeg, image/png">
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