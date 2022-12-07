@extends('layouts.master')
@section('title', 'BMTI - Pengaturan Sertifikat')

@section('custom-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
@endsection
@section('content')
@section('content')

<style>
    .marginCard {
        margin-bottom: 10px;
    }

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
                    <h4 class="card-title">{{ __('Template Sertifikat') }} <?php $fullurl = url('files/templates/sertifikat.pdf'); ?></h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-sm btn-rounded btn-icon-text marginCard">
                        <i class="ti-upload btn-icon-prepend"></i>
                        Upload Template Sertifikat
                    </a>
                    <a href="{{url('files/templates/sertifikat.rtf')}}" class="btn btn-primary btn-sm btn-rounded btn-icon-text marginCard">
                        <i class="ti-download btn-icon-prepend"></i>
                        Download Template Sertifikat
                    </a>
                    <div class="mb-5 row justify-content-center">
                        {{-- <object 
                            type="application/pdf"
                            data="{{asset('files/templates/sertifikat.pdf')}}"
                            width="100%"
                            test-id="embedded-preview"
                            style="height: calc(100vh - 120px);"
                            >
                            Document preview
                        </object> --}}
                        <iframe src='{{asset('files/templates/sertifikat.pdf')}}' width='100%' height='500vh' frameborder='0'>This is an embedded <a target='_blank' href=''{{asset('files/templates/sertifikat.pdf')}}'>Microsoft Office</a> document, powered by <a target='_blank' href=''{{asset('files/templates/sertifikat.pdf')}}'>Office Online</a>.</iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('sertifikat.upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_jenis_kegiatan" class="form-label">Template File</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection