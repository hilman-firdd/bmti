@extends('layouts.master')
@section('title', 'BMTI | DATA TOPIK')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Template Sertifikat') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('topik.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Kode Template</label>
                            <input type="text" name="kode_template" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Tipe Penomoran</label>
                            <input type="text" name="tipe_penomoran" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Pejabat</label>
                            <input type="text" name="pejabat" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="materi" class="form-label">Upload Template</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#dataTable').DataTable();

});
</script>
@endsection