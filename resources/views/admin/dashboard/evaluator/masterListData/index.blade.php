@extends('layouts.master')
@section('title', 'BMTI - Master List Data')
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
                    <h4 class="card-title">{{ __('Master Data List') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->

                    <div class="table-responsive">
                        <div class="marginCard">
                            <a href="{{route('masterListData.create')}}"
                                class="btn btn-primary btn-sm btn-rounded btn-icon-text">
                                Create
                            </a>
                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" style="margin-left:10px;">
                                Import Data
                            </button>
                            <a href="{{ asset('files/templates/template-import.xlsx') }}" download="" style="margin-left:10px;" class="btn btn-primary btn-sm btn-rounded btn-icon-text">
                                Download Template
                            </a>
                            <a href="{{ route('exportExcel') }}" style="margin-left:10px;" class="btn btn-primary btn-sm btn-rounded btn-icon-text">
                                Export Data
                            </a>
                        </div>
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Program</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Periode Awal</th>
                                    <th>Periode Akhir</th>
                                    <th>Pola</th>
                                    <th>Moda</th>
                                    <th>Pb</th>
                                    <th>Kelas Group</th>
                                    <th>Penanggung Jawab Kegiatan</th>
                                    <th>Peserta Dipanggil</th>
                                    <th>Peserta Hadir</th>
                                    <th>Peserta Tuntas</th>
                                    <th>Peserta Tidak Tuntas</th>
                                    <th>Tanggal Evaluasi</th>
                                    <th>Laporan</th>
                                    <!-- <th>Created At</th>
                                    <th>Updated At</th> -->
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->program}}</td>
                                    <td>{{$row->jenis_kegiatan}}</td>
                                    <td>{{$row->nama_kegiatan}}</td>
                                    <td>{{$row->periode_awal}}</td>
                                    <td>{{$row->periode_akhir}}</td>
                                    <td>{{$row->pola}}</td>
                                    <td>{{$row->moda}}</td>
                                    <td>{{$row->pb}}</td>
                                    <td>{{$row->kelas_group}}</td>
                                    <td>{{$row->penanggung_jawab_kegiatan}}</td>
                                    <td>{{$row->peserta_dipanggil}}</td>
                                    <td>{{$row->peserta_hadir}}</td>
                                    <td>{{$row->peserta_tuntas}}</td>
                                    <td>{{$row->peserta_tidak_tuntas}}</td>
                                    <td>{{$row->tanggal_evaluasi}}</td>
                                    <td>{{$row->laporan}}</td>
                                    <!-- <td>{{$row->created_at}}</td>
                                    <td>{{$row->updated_at}}</td> -->
                                    <td class="text-center">
                                        <a href="{{ route('masterListData.edit', ['id'=>$row->id]) }}"
                                            class="btn btn-dark btn-sm btn-rounded btn-icon-prepend">Edit
                                            <i class="ti-reload btn-icon-append"></i></a>
                                        <a href="{{ route('masterListData.delete', ['id'=>$row->id]) }}"
                                            onclick="return confirm('Apakah anda yakin ?')"
                                            class="btn btn-danger btn-sm btn-rounded btn-icon-text"
                                            style="margin-left:5px;">Delete
                                            <i class="ti-trash btn-icon-append"></i></a>
                                    </td>
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