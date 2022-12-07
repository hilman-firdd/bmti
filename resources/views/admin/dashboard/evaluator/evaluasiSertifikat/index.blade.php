@extends('layouts.master')
@section('title', 'BMTI - Sertifikat Peserta')
@section('custom-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
@endsection
@section('content')

<style>
.marginCard {
    margin-bottom: 10px;
}

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
                    <h4 class="card-title">{{ __('Sertifikat Peserta') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->

                    <div class="table-responsive">
                        <div class="marginCard">
                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" style="margin-left:10px;">
                                Import Data
                            </button>
                        </div>
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Kelompok Keahlian</th>
                                    <th>Nilai akhir</th>
                                    <th>Predikat</th>
                                    <th>No. Sertifikat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php $no = 1  @endphp
                                    @foreach($data as $dt)
                                    <tr>
                                        <td>@php echo $no++ @endphp</td>
                                        <td>{{$dt->nama_depan}}</td>
                                        <td>{{$dt->judul}}</td>
                                        <td>{{$dt->nama}}</td>
                                        <td>{{$dt->nilai}}</td>
                                        <td></td>
                                        <td>{{$dt->no_sertifikat}}</td>
                                        <td><a href="{{route('evaluasi.show', ['id' => $dt->id])}}"><i class="ti-eye btn-icon-append"></i></a></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Evaluasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="gambar" class="form-label">Import</label>
                        <input type="file" name="file" class="form-control" required accept=".xlsx, .xls">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">

</script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();

});
</script>
@endsection