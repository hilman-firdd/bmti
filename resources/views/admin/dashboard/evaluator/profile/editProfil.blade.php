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
                    <form action="{{route('profilEvaluator.update', ['id'=>$data->id])}}" method="POST"
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
                            <label for="nama_depan" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                aria-describedby="emailHelp" value="{{$data->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="emailHelp" value="{{$data->email}}" readonly="readonly">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="password"
                                aria-describedby="emailHelp" value="{{$data->password}}">
                        </div> --}}
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