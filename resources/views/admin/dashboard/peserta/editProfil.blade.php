@extends('layouts.master')
@section('title', 'BMTI - Edit Profile')
@section('content')

<style>
@media only screen and (min-width: 400px) and (max-width: 767px) {
    .grid-margin {
        margin-top: 20px;
    }
}
</style>

<div class="content-wrapper">
    <div class="row justify-content-center">
        <!-- <div class="col-12 col-lg-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <img class="rounded-circle" src="{{asset('images/profil/'.$data->foto)}}" alt="Profile image"
                            width="120px" height="120px" type="file" name="foto_new" class="form-control"
                            accept="image/jpg, image/jpeg, image/png">
                        <p class="mb-1"><b>{{auth()->user()->name}}</b></p>
                        <p>{{auth()->user()->email}}</p>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('profilPeserta.update', ['id'=>$data->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3 text-center">
                            <img class="rounded-circle" src="{{asset('images/profil/'.$data->foto)}}"
                                alt="Profile image" width="120px" height="120px" type="file" name="foto_new"
                                class="form-control" accept="image/jpg, image/jpeg, image/png">
                            <p class="mb-1"><b>{{auth()->user()->name}}</b></p>
                            <p>{{auth()->user()->email}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Pilih Foto</label>
                            <input type="hidden" name="foto_old" value="{{$data->foto}}" class="form-control">
                            <input type="file" name="foto_new" class="form-control"
                                accept="image/jpg, image/jpeg, image/png">

                        </div>
                        <div class="mb-3">
                            <label for="nuptk" class="form-label">NUPTK</label>
                            <input type="text" name="nuptk" class="form-control" id="nuptk" value="{{$data->nuptk}}"
                                readonly="readonly">
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" id="nik" value="{{$data->nik}}"
                                readonly="readonly">
                        </div>
                        <div class="mb-3">
                            <label for="nama_depan" class="form-label">Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control" id="nama_depan"
                                aria-describedby="emailHelp" value="{{$data->nama_depan}}">
                        </div>
                        <div class="mb-3">
                            <label for="nama_belakang" class="form-label">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" id="nama_belakang"
                                aria-describedby="emailHelp" value="{{$data->nama_belakang}}">
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                aria-describedby="emailHelp" value="{{$data->tempat_lahir}}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                aria-describedby="emailHelp" value="{{$data->tanggal_lahir}}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat"
                                aria-describedby="emailHelp" value="{{$data->alamat}}">
                        </div>
                        <div class="mb-3">
                            <label for="desa_kelurahan" class="form-label">Desa / Kelurahan</label>
                            <select id="desa_kelurahan" type="text" name="desa_kelurahan" class="form-control">
                                @if(is_null($dk))
                                {
                                    <option value="">-</option>    
                                }
                                @else{
                                    <option value="{{$data->desa_kelurahan}}">{{$dk->nama_desa_kelurahan}}</option>
                                }
                                @endif
                                @foreach($desa_kelurahan as $row)
                                <option value="{{$row->id}}">{{$row->nama_desa_kelurahan}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="number" name="desa_kelurahan" class="form-control" id="desa_kelurahan"
                                aria-describedby="emailHelp" value="{{$data->desa_kelurahan}}"> -->
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <select type="text" id="kecamatan" name="kecamatan" class="form-control">
                                @if(is_null($dk))
                                {
                                    <option value="">-</option>    
                                }
                                @else{
                                    <option value="{{$data->kecamatan}}">{{$k->nama_kecamatan}}</option>
                                }
                                @endif
                                @foreach($kecamatan as $row)
                                <option value="{{$row->id}}">{{$row->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="number" name="kecamatan" class="form-control" id="kecamatan"
                                aria-describedby="emailHelp" value="{{$data->kecamatan}}"> -->
                        </div>
                        <div class="mb-3">
                            <label for="kota_kab" class="form-label">Kota / Kabupaten</label>
                            <select type="text" id="kota_kab" name="kota_kab" class="form-control">
                                @if(is_null($dk))
                                {
                                    <option value="">-</option>    
                                }
                                @else{
                                    <option value="{{$data->kota_kab}}">{{$kk->nama_kota_kab}}</option>
                                }
                                @endif
                                @foreach($kota_kab as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="number" name="kota_kab" class="form-control" id="kota_kab"
                                aria-describedby="emailHelp" value="{{$data->kota_kab}}"> -->
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <select type="text" id="provinsi"name="provinsi" class="form-control">
                                @if(is_null($dk))
                                {
                                    <option value="">-</option>    
                                }
                                @else{
                                    <option value="{{$data->provinsi}}">{{$p->nama_provinsi}}</option>
                                }
                                @endif
                                @foreach($provinsi as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="number" name="provinsi" class="form-control" id="provinsi"
                                aria-describedby="emailHelp" value="{{$data->provinsi}}"> -->
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="emailHelp" value="{{$data->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">Nomer Telpon</label>
                            <input type="number" name="no_telepon" class="form-control" id="no_telepon"
                                aria-describedby="emailHelp" value="{{$data->no_telepon}}">
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" id="no_telepon"
                                aria-describedby="emailHelp" value="{{$data->asal_sekolah}}">
                        </div>
                        <div class="mt-4 text-center">
                            <button type="submit" class="btn btn-primary btn-sm btn-rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#desa_kelurahan').change(function() {
        var id_desa_kelurahan = $('#desa_kelurahan').val();
        load_data(id_desa_kelurahan)
    });

});

function load_data(search) {
    $.ajax({
        url: "/peserta/get-data-alamat",
        method: "GET",
        data: {
            search: search
        },
        success: function(data) {
            console.log(data.data[0].id_kecamatan)
            $('#kecamatan').val(data.data[0].id_kecamatan);
            $('#kota_kab').val(data.data[0].id_kota_kab);
            $('#provinsi').val(data.data[0].id_provinsi);
        }
    });
}
</script>
@endsection