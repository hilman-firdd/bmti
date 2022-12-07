@extends('layouts.master')
@section('title', 'BMTI | DATA TOPIK QUIZ')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Topik Quiz') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('topikQuiz.update', ['id'=>$data->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="topik_id" class="form-label">Topik ID</label>
                            <select type="text" name="topik_id" class="form-control">
                                @foreach($topik as $row)
                                <option value="{{$row->id}}">{{$row->judul}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quiz_id" class="form-label">Quiz ID</label>
                            <select type="text" name="quiz_id" class="form-control">
                                @foreach($quiz as $row)
                                <option value="{{$row->id}}">{{$row->judul}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
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