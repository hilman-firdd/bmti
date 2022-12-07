@extends('layouts.master')
@section('title', 'BMTI - Edit Data Perusahaan Mitra')
@section('content')

<style>
@media only screen and (min-width: 400px) and (max-width: 767px) {
    .marginResponsive {
        margin-top: 25px;
    }
    .img-perusahaan {
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
                    <form action="{{route('perusahaanMitra.update', ['id'=>$data->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="inputnama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" class="form-control" id="inputnama_perusahaan"
                                aria-describedby="emailHelp" value="{{$data->nama_perusahaan}}">
                        </div>
                        <div class="mb-3">
                            <label for="inputgambar_logo" class="form-label">Gambar Logo</label>
                            <div class="mb-2">
                                <img class="img-perusahaan" src="{{asset('images/perusahaan-mitra/'.$data->gambar_logo)}}" alt="" width="300"
                                    height="200">
                            </div>
                            <input type="hidden" name="gambar_logo_old" class="form-control"
                                value="{{$data->gambar_logo}}">
                            <input type="file" name="gambar_logo_new" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="inputnama_perusahaan" class="form-label">Urutan</label>
                            <input type="text" name="urutan" class="form-control" value="{{$data->urutan}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-rounded">Perbaharui</button>
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