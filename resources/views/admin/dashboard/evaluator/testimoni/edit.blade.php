@extends('layouts.master')
@section('title', 'BMTI - Edit Data Testimoni')
@section('content')

<style>
@media only screen and (min-width: 400px) and (max-width: 640px) {
    .grid-margin {
        margin-top: 20px;
    }
}
</style>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Master Testimoni') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('testimoni.update', ['id'=>$data->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{$data->nama}}">
                        </div>
                        <div class="mb-3">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah"
                                value="{{$data->asal_sekolah}}">
                        </div>
                        <div class="mb-3">
                            <label for="nama_diklat" class="form-label">Nama Diklat</label>
                            <input type="text" name="nama_diklat" class="form-control" id="nama_diklat"
                                value="{{$data->nama_diklat}}">
                        </div>
                        <div class="mb-3">
                            <label for="testimoni" class="form-label">Testimoni</label>
                            <textarea type="text" name="testimoni" class="form-control"
                                id="testimoni">{{$data->testimoni}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="created_by" class="form-label">Created By</label>
                            <input type="text" name="created_by" class="form-control" id="created_by"
                                value="{{$data->created_by}}">
                        </div>
                        <div class="mb-3">
                            <label for="updated_by" class="form-label">Updated By</label>
                            <input type="text" name="updated_by" class="form-control" id="updated_by"
                                value="{{$data->updated_by}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-sm btn-rounded">Submit</button>
                        </div>
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