@extends('layouts.master')
@section('title', 'BMTI | DATA KURSUS')
@section('content')

<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Buat Pelatihan Mandiri') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('kursus.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <label for="judul" class="col-sm-3 col-form-label">Nama Pelatihan</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul" class="form-control mt-2">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi Pelatihan</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="deskripsi" class="form-control mt-2" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label for="kategori_kursus_id" class="col-sm-3 col-form-label">Kategori Kursus</label>
                            <div class="col-sm-9">
                                <select type="text" name="kategori_kursus_id" class="form-control mt-2">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gambar" class="col-sm-3 col-form-label">Upload Gambar</label>
                            <div class="col-sm-9">
                                <input type="file" name="gambar" class="form-control mt-2">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-danger btn-sm btn-rounded float-right ml-2">Batal</button>
                                <button type="submit" class="btn btn-primary btn-sm btn-rounded float-right">Lanjutkan</button>
                            </div>
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