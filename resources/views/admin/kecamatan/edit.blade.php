@extends('layouts.master')
@section('title', 'BMTI - Edit Data Kecamatan')
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
                    <h4 class="card-title">{{ __('Data Kecamatan') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('kecamatan.update', ['id'=>$data->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="kota_kab_id" class="form-label">Nama Kota Kabupaten</label>
                            <select type="text" name="kota_kab_id" class="form-control">
                                <option value="{{$data->id}}">{{$k->nama_kabupaten}}</option>
                                @foreach($kota_kab as $row)
                                <option value="{{$row->id}}" {{ ($row->id == $data->kota_kab_id ? 'selected' : '') }}>{{
                                $row->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" name="kode" class="form-control" id="kode" aria-describedby="emailHelp"
                                required value="{{$data->kode}}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kecamatan</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                aria-describedby="emailHelp" required value="{{$data->nama_kecamatan}}">
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