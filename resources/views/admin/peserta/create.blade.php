@extends('layouts.master')
@section('title', 'BMTI - Create Data Peserta')
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
                    <h4 class="card-title">{{ __('Data Peserta') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('peserta.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nuptk" class="form-label">NUPTK</label>
                            <input type="text" name="nuptk" class="form-control" id="nuptk">
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" id="nik">
                        </div>
                        <div class="mb-3">
                            <label for="nama_depan" class="form-label">Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control" id="nama_depan">
                        </div>
                        <div class="mb-3">
                            <label for="nama_belakang" class="form-label">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" id="nama_belakang">
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea type="text" name="alamat" class="form-control" id="alamat" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="desa_kelurahan" class="form-label">Desa / Kelurahan</label>
                            <select id="desa_kelurahan" type="text" name="desa_kelurahan" class="form-control">
                                @foreach($desa_kelurahan as $row)
                                <option value="{{$row->id}}">{{$row->nama_desa_kelurahan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <select type="text" id="kecamatan" name="kecamatan" class="form-control">
                                <option value="">-</option>
                                @foreach($kecamatan as $row)
                                <option value="{{$row->id}}">{{$row->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kota_kab" class="form-label">Kota / Kabupaten</label>
                            <select type="text" id="kota_kab" name="kota_kab" class="form-control">
                                <option value="">-</option>
                                @foreach($kota_kab as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <select type="text" id="provinsi"name="provinsi" class="form-control">
                                <option value="">-</option>
                                @foreach($provinsi as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">Nomer Telpon</label>
                            <input type="number" name="no_telepon" class="form-control" id="no_telepon">
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" id="no_telepon">
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