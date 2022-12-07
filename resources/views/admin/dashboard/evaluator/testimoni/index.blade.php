@extends('layouts.master')
@section('title', 'BMTI - Master Data Testimoni')
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
                    <h4 class="card-title">{{ __('Master Data Testimoni') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->

                    <div class="table-responsive">
                        <div class="marginCard">
                            <a href="{{route('testimoni.create')}}"
                                class="btn btn-primary btn-sm btn-rounded btn-icon-text">
                                Create
                            </a>
                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" style="margin-left:10px;">
                                Import Data
                            </button>
                            <a href="{{ asset('files/templates/Template-Testimoni.xlsx') }}" class="btn btn-primary btn-sm btn-rounded" style="margin-left:10px;">
                                Template Data
                            </a>
                            <a href="{{ route('exportTestimoni') }}" class="btn btn-primary btn-sm btn-rounded btn-icon-text">
                                Export Data
                            </a>
                        </div>
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Asal Sekolah</th>
                                    <th>Nama Diklat</th>
                                    <th>Testimoni</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
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
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->asal_sekolah}}</td>
                                    <td>{{$row->nama_diklat}}</td>
                                    <td>{{substr($row->testimoni, 0, 200);}} ....</td>
                                    <td>{{$row->created_by}}</td>
                                    <td>{{$row->updated_by}}</td>
                                    <!-- <td>{{$row->created_at}}</td>
                                    <td>{{$row->updated_at}}</td> -->
                                    <td class="text-center">
                                        <a href="{{ route('testimoni.edit', ['id'=>$row->id]) }}"
                                            class="btn btn-dark btn-sm btn-rounded btn-icon-prepend">Edit
                                            <i class="ti-reload btn-icon-append"></i></a>
                                        <a href="{{ route('testimoni.delete', ['id'=>$row->id]) }}"
                                            onclick="return confirm('Apakah anda yakin ?')"
                                            class="btn btn-danger btn-sm btn-rounded btn-icon-text" style="margin-left:5px;">Delete
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
                <form action="{{ route('importTestimoni') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="gambar" class="form-label">Import</label>
                        <input type="file" name="file" class="form-control" required accept=".xlsx, .xls">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="margin-left:10px;">Import</button>
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