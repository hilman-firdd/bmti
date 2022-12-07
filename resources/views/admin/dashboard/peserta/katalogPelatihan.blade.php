@extends('layouts.master')
@section('title', 'BMTI - Katalog')

@section('content')
<style>
@media only screen and (min-width: 400px) and (max-width: 767px) {
    .marginCard {
        margin-top: 20px;
    }
    .card {
        margin-bottom: 150px;
    }
}
@media only screen and (min-width: 767px){
    .card {
        margin-bottom: 30px;
    }
}
</style>

<div class="container">
    <div class="mt-3 row" style="font-family:glory;">
        <div class="col-md-4">
            <select name="kelompok_keahlian_id" class="form-control">
                <option value="">Plih Kelompok Keahlian</option>
                @foreach($kelompokKeahlian as $ka)
                <option value="{{$ka->id}}">{{$ka->kode}} - {{$ka->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-8 marginCard">
            <input type="text" id="search" name="search" class="form-control" placeholder="Cari Pelatihan">
        </div>
    </div>
    <div class="mt-3 row">
        @foreach($data as $dt)
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card" style="font-family:glory;">
                <img class="rounded card-img-top" src="{{asset('/images/pelatihan/'.$dt->gambar)}}" alt="Card image cap" height="160px">
                <div class="text-center card-body">
                    <h4>{{$dt->judul}}</h4>
                    <a href="{{route('peserta.pelatihan.katalog.detail', ['idPelatihan' => $dt->id])}}" class="text-center btn btn-sm btn-primary">Lihat Selengkapnya...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        load_data();

        function load_data(search) {
            $.ajax({
                url: "/pelatihan/get-data-pelatihan",
                method: "GET",
                data: {
                    search: search
                },
                success: function(data) {
                    $('#hasil').html(data);
                }
            });
        }

        $('#search').keyup(function() {
            var search = $("#search").val();
            load_data(search);
        });
    });
</script>
@endsection