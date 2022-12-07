@extends('layouts.master')
@section('title', 'BMTI | DATA PELATIHAN')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Pelatihan') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('pelatihanMandiri.update', ['id'=>$data->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="inputnama_pelatihan" class="form-label">Nama Pelatihan</label>
                            <input type="text" name="nama_pelatihan" class="form-control" id="inputnama_pelatihan"
                                aria-describedby="emailHelp" value="{{$data->nama_pelatihan}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
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