@extends('layouts.master')
@section('title', 'BMTI | DATA KATEGORI KURSUS')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Kategori Kursus') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('kategoriKursus.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputkode" class="form-label">Kode</label>
                            <input type="text" name="kode" class="form-control" id="inputkode"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inputnama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="inputnama"
                                aria-describedby="emailHelp">
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