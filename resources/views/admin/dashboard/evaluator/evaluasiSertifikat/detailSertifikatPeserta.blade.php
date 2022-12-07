@extends('layouts.master')
@section('title', 'BMTI - Evaluasi sertifikat')
@section('content')

<style>
    @media only screen and (min-width: 400px) and (max-width: 767px) {
        .grid-margin {
            margin-top: 20px;
        }
    }
</style>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Sertifikat Peserta') }}</h4>
                    <div class="mb-3 row">
                        <div class="col-md-3">
                            <img class="rounded" src="{{asset('/images/pelatihan/'.$data->gambar)}}" width="250px" height="200px" />
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col">
                                    <label for="">No. Sertifikat</label></br>
                                    <a href="{{asset('/files/sertifikat_peserta/'.$data->sertifikat_file_name)}}">Click untuk download sertifikat</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Upload Hasil Evaluasi</label>
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection