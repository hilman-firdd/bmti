@extends('layouts.master')
@section('title', 'BMTI - Create Data Quiz')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Quiz') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('quiz.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputjudul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="inputjudul"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inputdeskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="inputdeskripsi"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inputdurasi" class="form-label">Durasi</label>
                            <input type="number" name="durasi" class="form-control" id="inputdurasi"
                                aria-describedby="emailHelp" placeholder="Menit">
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