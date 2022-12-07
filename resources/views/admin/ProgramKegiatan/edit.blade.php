@extends('layouts.master')
@section('title', 'BMTI - Edit Data Program Kegiatan')
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
                    <h4 class="card-title">{{ __('Data Program Kegiatan') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('programKegiatan.update', ['id'=>$data->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="inputnama" class="form-label">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" class="form-control"
                                value="{{$data->nama_kegiatan}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputnama" class="form-label">Kode Kegiatan</label>
                            <input type="text" name="kode_kegiatan" class="form-control"
                                value="{{$data->kode_kegiatan}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputnama" class="form-label">Kode Kegiatan</label>
                            <select type="text" name="jenis_kegiatan_id" class="form-control" required>
                                @foreach($jenisKegiatan as $dt)
                                <option value="{{$dt->id}}">{{$dt->nama_jenis_kegiatan}}</option>
                                @endforeach
                            </select>
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