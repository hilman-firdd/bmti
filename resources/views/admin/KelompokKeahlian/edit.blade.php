@extends('layouts.master')
@section('title', 'BMTI - Edit Data Kelompok Keahlian')
@section('content')

<style>
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
                    <h4 class="card-title">{{ __('Kelompok Keahlian') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('kelompokKeahlian.update', ['id'=>$kelompokKeahlian->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="inputnama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $kelompokKeahlian->nama }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="inputnama" class="form-label">kode (KDKKM)</label>
                            <input type="text" name="kode" class="form-control" value="{{ $kelompokKeahlian->kode}}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="inputnama" class="form-label">Program Keahlian</label>
                            <select type="text" name="program_keahlian_id" class="form-control">
                                @foreach($programKeahlian as $bk)
                                <option value="{{$bk->id}}">{{$bk->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="inputnama" class="form-label">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control"
                                required>{{ $kelompokKeahlian->deskripsi }}</textarea>
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