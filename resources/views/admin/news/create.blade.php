@extends('layouts/app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')



    <div class="container">

        <form method="POST" action="/home/news/store" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="connection">img</label>
                <input type="file" class="form-control" id="connection"  name="connection" required>
            </div>
            <div class="form-group">
                <label for="imgs">img</label>
                <input type="file" class="form-control" id="imgs"  name="imgs[]" required multiple>
            </div>
            <div class="form-group">
                <label for="queue">title</label>
                <input type="text" class="form-control" id="queue"  name="queue"  required>
            </div>
            <div class="form-group">
                <label for="payload">main</label>
                <textarea type="text" class="form-control" id="payload" name="payload" required></textarea>
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

