@extends('layouts.master')
@section('title', 'BMTI - Data Pelatihan Mandiri')

@section('custom-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
@endsection

@section('content')
<style>
.marginCard {
    margin-bottom: 10px;
}

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
                    <h4 class="card-title">{{ __('Data Pelatihan') }}</h4>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <a href="{{route('pelatihan.create')}}"
                                        class="btn btn-primary btn-sm btn-rounded btn-icon-text marginCard">
                                        <i class="ti-upload btn-icon-prepend"></i>
                                        Create
                                    </a>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Kelompok Keahlian</th>
                                    <th class="text-center">Jumlah konten</th>
                                    <th>Author</th>
                                    <th class="text-center">Status Aktif</th>
                                    <th class="text-center">Status Publish</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>{{$row->judul}}</td>
                                    <td>{{$row->kategori_kursus}}</td>
                                    <td></td>
                                    <td>{{$row->author}}</td>
                                    <td class="text-center">
                                        @if($row->status_aktif == 1)
                                        Aktif
                                        @else
                                        Non Aktif
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($row->status_aktif == 1)
                                        Publish
                                        @else
                                        Unpublish
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('pelatihan.topik', [$row->id]) }}"
                                            class="btn btn-dark btn-sm btn-rounded btn-icon-prepend">Atur
                                            <i class="ti-reload btn-icon-append"></i></a>
                                        <a href="{{ route('pelatihan.delete', ['id'=>$row->id]) }}"
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