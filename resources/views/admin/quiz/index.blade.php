@extends('layouts.master')
@section('title', 'BMTI - Data Quiz')

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
                    <h4 class="card-title">{{ __('Bank Soal') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->

                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded marginCard" data-toggle="modal" data-target="#exampleModalCenter">Tambah Quiz</button>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tipe Soal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>{{$row->judul}}</td>
                                    <td>{{$row->kelompok_keahlian}}</td>
                                    <td>
                                        @if($row->tipe_quiz == 1)
                                        Test Akhir
                                        @elseif($row->tipe_quiz == 2)
                                        Timbal Balik
                                        @else
                                        Formatif
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('quiz.edit', ['id'=>$row->id]) }}" class="btn btn-dark btn-sm btn-rounded btn-icon-prepend">Pengaturan
                                            <i class="ti-reload btn-icon-append"></i></a>
                                        <a href="{{ route('quiz.delete', ['id'=>$row->id]) }}" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger btn-sm btn-rounded btn-icon-text" style="margin-left:5px;">Delete
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Data Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('quiz.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Nama</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Kategori</label>
                        <select type="text" name="kelompok_keahlian_id" class="form-control" required>
                            @foreach($kelKeahlian as $kel)
                            <option value="{{$kel->id}}">{{$kel->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Tipe</label>
                        <select type="text" name="tipe_quiz" class="form-control" required>
                            <option value="1">Test Akhir</option>
                            <option value="2">Timbal Balik</option>
                            <option value="3">Formatif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="ckeditor form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-rounded" style="margin-left:5px;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">

</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

    });
</script>
@endsection