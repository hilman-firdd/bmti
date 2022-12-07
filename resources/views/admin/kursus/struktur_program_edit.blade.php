@extends('layouts.master')
@section('title', 'BMTI - Edit Struktur Program')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Struktur Program') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form
                        action="{{ route('pelatihan.strukturProgram.update',['pelatihanId'=>$pelatihanId, 'id'=>$id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Kategori</label>
                            <select type="text" name="kategori" class="form-control">
                                <option value="{{$data->kategori}}">{{$data->kategori}}</option>
                                <option value="UMUM">UMUM</option>
                                <option value="POKOK">POKOK</option>
                                <option value="PENUNJANG">PENUNJANG</option>
                            </select>
                            <input type="hidden" name="pelatihanId" value="{{$pelatihanId}}">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Materi</label>
                            <textarea type="text" name="materi"
                                class="ckeditor form-control">{{$data->materi}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Jam Pelajaran</label>
                            <input type="number" name="jam_pelajaran" class="form-control"
                                value="{{$data->jam_pelajaran}}">
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