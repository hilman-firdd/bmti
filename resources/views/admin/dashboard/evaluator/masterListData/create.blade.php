@extends('layouts.master')
@section('title', 'BMTI - Create List Data')
@section('content')

<style>
@media only screen and (min-width: 400px) and (max-width: 640px) {
    .grid-margin {
        margin-top: 20px;
    }
}
</style>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Master List') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('masterListData.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="program" class="form-label">Program</label>
                            <input type="text" name="program" class="form-control" id="program" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                            <input type="text" name="jenis_kegiatan" class="form-control" id="jenis_kegiatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="periode_awal" class="form-label">Periode Awal</label>
                            <input type="date" name="periode_awal" class="form-control" id="periode_awal" required>
                        </div>
                        <div class="mb-3">
                            <label for="periode_akhir" class="form-label">Periode Akhir</label>
                            <input type="date" name="periode_akhir" class="form-control" id="periode_akhir" required>
                        </div>
                        <div class="mb-3">
                            <label for="pola" class="form-label">Pola</label>
                            <input type="text" name="pola" class="form-control" id="pola" required>
                        </div>
                        <div class="mb-3">
                            <label for="moda" class="form-label">Moda</label>
                            <input type="text" name="moda" class="form-control" id="moda" required>
                        </div>
                        <div class="mb-3">
                            <label for="pb" class="form-label">Pb</label>
                            <input type="text" name="pb" class="form-control" id="pb" required>
                        </div>
                        <div class="mb-3">
                            <label for="kelas_group" class="form-label">Kelas Group</label>
                            <input type="text" name="kelas_group" class="form-control" id="kelas_group" required>
                        </div>
                        <div class="mb-3">
                            <label for="penanggung_jawab_kegiatan" class="form-label">Penanggung Jawab Kegiatan</label>
                            <input type="text" name="penanggung_jawab_kegiatan" class="form-control"
                                id="penanggung_jawab_kegiatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="peserta_dipanggil" class="form-label">Peserta Dipanggil</label>
                            <input type="number" name="peserta_dipanggil" class="form-control" id="peserta_dipanggil" required>
                        </div>
                        <div class="mb-3">
                            <label for="peserta_hadir" class="form-label">Peserta Hadir</label>
                            <input type="number" name="peserta_hadir" class="form-control" id="peserta_hadir" required>
                        </div>
                        <div class="mb-3">
                            <label for="peserta_tuntas" class="form-label">Peserta Tuntas</label>
                            <input type="number" name="peserta_tuntas" class="form-control" id="peserta_tuntas" required>
                        </div>
                        <div class="mb-3">
                            <label for="peserta_tidak_tuntas" class="form-label">Peserta Tidak Tuntas</label>
                            <input type="number" name="peserta_tidak_tuntas" class="form-control"
                                id="peserta_tidak_tuntas" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_evaluasi" class="form-label">Tanggal Evaluasi</label>
                            <input type="date" name="tanggal_evaluasi" class="form-control" id="tanggal_evaluasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="laporan" class="form-label">Laporan</label>
                            <input type="text" name="laporan" class="form-control" id="laporan" required>
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