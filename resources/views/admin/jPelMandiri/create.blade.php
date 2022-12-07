@extends('layouts.master')
@section('title', 'BMTI | DATA JENIS PELATIHAN')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Jenis Pelatihan') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('jenisPelatihanMandiri.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputid_pelatihan" class="form-label">ID Pelatihan</label>
                            <select type="text" name="id_pelatihan" class="form-control">
                                @foreach($pMandiri as $row)
                                <option value="{{$row->id}}">{{$row->nama_pelatihan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputid_content" class="form-label">ID Content</label>
                            <select type="text" name="id_content" class="form-control">
                                @foreach($content as $row)
                                <option value="{{$row->id}}">{{$row->course_content}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputjudul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="inputjudul"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inputgambar_banner" class="form-label">Gambar Banner</label>
                            <input type="file" name="gambar_banner" class="form-control" id="inputgambar_banner"
                                aria-describedby="emailHelp">
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