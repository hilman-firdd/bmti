@extends('layouts.master')
@section('title', 'BMTI | DATA JENIS PELATIHAN')
@section('content')

<style>
.marginCard {
    margin-bottom: 10px;
}
</style>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Jenis Pelatihan') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->

                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <a href="{{route('jenisPelatihanMandiri.create')}}"
                                        class="btn btn-primary btn-rounded btn-icon-text marginCard">
                                        <i class="ti-upload btn-icon-prepend"></i>
                                        Create
                                    </a>
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Pelatihan</th>
                                    <th>ID Content</th>
                                    <th>Judul</th>
                                    <th>Gambar Banner</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->id_pelatihan}}</td>
                                    <td>{{$row->id_content}}</td>
                                    <td>{{$row->judul}}</td>
                                    <td>{{$row->gambar_banner}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>{{$row->updated_at}}</td>
                                    <td><a href="{{ route('jenisPelatihanMandiri.edit', ['id'=>$row->id]) }}"
                                            class="btn btn-dark btn-rounded btn-icon-prepend">Edit
                                            <i class="ti-reload btn-icon-append"></i></a></td>
                                    <td><a href="{{ route('jenisPelatihanMandiri.delete', ['id'=>$row->id]) }}"
                                            class="btn btn-danger btn-rounded btn-icon-text">Delete
                                            <i class="ti-trash btn-icon-append"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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