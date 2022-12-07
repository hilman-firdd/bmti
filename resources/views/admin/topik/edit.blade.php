@extends('layouts.master')
@section('title', 'BMTI - Edit Topik')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Edit Topik') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('topik.update', ['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul" value="{{$data->judul}}">
                        </div>
                        <div class="mb-3">
                            <label for="materi" class="form-label">Deskripsi</label>
                            <textarea type="text" name="materi" class="form-control" id="materi">{{$data->materi}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-rounded">Perbaharui</button>
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