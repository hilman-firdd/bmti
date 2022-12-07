@extends('layouts.master')
@section('title', 'BMTI - Create Data Kelurahan')
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
                    <h4 class="card-title">{{ __('Data Kelurahan') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('kelurahan.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="id_kecamatan" class="form-label">Nama Kecamatan</label>
                            <select type="text" name="id_kecamatan" class="form-control">
                                <option value=""> - </option>
                                @foreach($data as $row)
                                <option value="{{$row->id}}">{{$row->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" name="kode" class="form-control" id="kode" aria-describedby="emailHelp"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_desa_kelurahan" class="form-label">Nama Desa Kelurahan</label>
                            <input type="text" name="nama_desa_kelurahan" class="form-control" id="nama_desa_kelurahan"
                                aria-describedby="emailHelp" required>
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