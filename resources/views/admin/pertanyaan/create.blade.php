@extends('layouts.master')
@section('title', 'BMTI | DATA PERTANYAAN')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Pertanyaan') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('pertanyaan.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputquiz_id" class="form-label">Kelompok Keahlian</label>
                            <select type="text" name="kelompok_keahlian_id" class="form-control">
                                @foreach($kelKeahlian as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputpertanyaan" class="form-label">Pertanyaan</label>
                            <textarea type="text" name="pertanyaan" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inputgambar" class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="inputgambar"
                                aria-describedby="emailHelp" required accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <div class="mb-3">
                            <label for="inputpilihan_a" class="form-label">Pilihan A</label>
                            <input type="text" name="pilihan_a" class="form-control" id="inputpilihan_a"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputpilihan_b" class="form-label">Pilihan B</label>
                            <input type="text" name="pilihan_b" class="form-control" id="inputpilihan_b"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputpilihan_c" class="form-label">Pilihan C</label>
                            <input type="text" name="pilihan_c" class="form-control" id="inputpilihan_c"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputpilihan_d" class="form-label">Pilihan D</label>
                            <input type="text" name="pilihan_d" class="form-control" id="inputpilihan_d"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="jawaban" class="form-label">Jawaban</label>
                            <input type="text" name="jawaban" class="form-control" id="jawaban"
                                aria-describedby="emailHelp" required>
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