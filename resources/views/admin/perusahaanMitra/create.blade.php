@extends('layouts.master')
@section('title', 'BMTI - Create Data Perusahaan Mitra')
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
                    <h4 class="card-title">{{ __('Data Perusahaan Mitra') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('perusahaanMitra.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputnama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" class="form-control" id="inputnama_perusahaan"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inputgambar_logo" class="form-label">Gambar Logo</label>
                            <input type="file" name="gambar_logo" class="form-control" id="inputgambar_logo"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inputnama_perusahaan" class="form-label">Urutan</label>
                            <input type="text" name="urutan" class="form-control">
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