@extends('layouts.master')
@section('title', 'BMTI | DATA CONTENT')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Data Content') }}</h4>
                    <!-- <p class="card-description">
                    </p> -->
                    <form action="{{route('content.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputcourse_content" class="form-label">Course Content</label>
                            <input type="text" name="course_content" class="form-control" id="inputcourse_content"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inputlesson_content" class="form-label">Lesson Content</label>
                            <input type="text" name="lesson_content" class="form-control" id="inputlesson_content"
                                aria-describedby="emailHelp">
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