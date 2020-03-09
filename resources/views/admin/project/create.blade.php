@extends('layouts/app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')



    <div class="container">

        <form method="POST" action="/home/project/store" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="types">類別</label>
                <input type="text" class="form-control" id="types"  name="types" required>
            </div>

            <div class="form-group">
                <label for="sort">權重</label>
                <input type="text" class="form-control" id="sort"  name="sort"  required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
  $('#payload').summernote();
});
</script>
@endsection

