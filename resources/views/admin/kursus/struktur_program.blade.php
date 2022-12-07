@extends('layouts.master')
@section('title', 'BMTI | Pelatihan')
@section('content')

@section('custom-css')
<style>
.backdrop-modal {
    padding: 20px;
    position: absolute;
    top: 200px;
    width: 95%;
    right: 2%;
    height: auto;
    background-color: white;
    border: 1px solid #ddd;
    box-shadow: 0.2px 0.6px 0.5px 0.5px;
    z-index: 1;
}

.topik {
    padding-left: 30px;
    display: flex;
    color: #8D8D8D;
}

.pelatihan {
    display: flex;
}

.pelatihan i {
    float: inline-end;
}

.button-container {
    margin-top: 20px;
}

#modal-topik {
    position: fixed;
    left: 400px;
    min-width: 1000px;
}

.konten {
    padding-left: 30px;
}

.kuis {
    padding-left: 30px;
}

.btn-tambah-konten a {
    text-decoration: none;
}

.header-container {
    background-color: #ebebeb;
}

.font-italic {
    font-style: italic;
}

table td {
    table-layout: fixed;
}
</style>
@endsection

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="header-container d-flex justify-content-between">
                <div class="pt-2 pl-2">
                    <h3>Struktur Program</h3>
                    <p>Deskripsi struktur Program Dari Pelatihan</p>
                </div>
                <div class="pt-2">
                    <a class="btn btn-md btn-rounded btn-danger btn-block" href="#" onclick="history.back()">Batal</a><a
                        id="btn-to-konten-lesson" class="btn btn-md btn-rounded btn-primary btn-block" href="#"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Materi</th>
                                <th class="text-center">Jam Pelajaran</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->kategori}}</td>
                                <td>{{$dt->materi}}</td>
                                <td class="text-center">{{$dt->jam_pelajaran}}</td>
                                <td><a href="{{ route('pelatihan.strukturProgram.edit',['pelatihanId'=>$dt->kursus_id, 'id'=>$dt->id]) }}"
                                        class="btn btn-dark btn-sm btn-rounded btn-icon-prepend">Edit
                                        <i class="ti-reload btn-icon-append"></i></a></td>
                                <td><a href="{{ route('pelatihan.strukturProgram.delete',['pelatihanId'=>$dt->kursus_id, 'id'=>$dt->id]) }}"
                                        class="btn btn-danger btn-sm btn-rounded btn-icon-text"
                                        onclick="return confirm('Apakah anda yakin ?')">Delete
                                        <i class="ti-trash btn-icon-append"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Struktur Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('pelatihan.strukturProgram.simpan')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Kategori</label>
                        <select type="text" name="kategori" class="form-control">
                            <option value="">-</option>
                            <option value="UMUM">UMUM</option>
                            <option value="POKOK">POKOK</option>
                            <option value="PENUNJANG">PENUNJANG</option>
                        </select>
                        <input type="hidden" name="pelatihanId" value="{{$pelatihanId}}">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Materi</label>
                        <textarea type="text" name="materi" class="ckeditor form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Jam Pelajaran</label>
                        <input type="number" name="jam_pelajaran" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection