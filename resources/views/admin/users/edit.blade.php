@extends('layouts.master')
@section('title', 'BMTI - Edit Data Pengguna')
@section('content')

<style>
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
                    <h4 class="card-title">{{ __('Data User') }}</h4>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('user.update', ['id'=>$user->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="inputname" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="inputname"
                                aria-describedby="emailHelp" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputemail" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="inputemail"
                                aria-describedby="emailHelp" value="{{ $user->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputrole_id" class="form-label">Role Id</label>
                            <select type="text" name="role_id" class="form-control">
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endforeach
                            </select>
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