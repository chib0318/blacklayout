@extends('layouts/app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')



    <div class="container">

        <form method="POST" action="/home/project/store2" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="types_id">類別</label>
                    <select class="form-control" id="types_id" name="types_id">
                    @foreach ($prodtypes as $item)


                    <option value="{{$item->id}}" >
                        {{$item->types}}
                    </option>


                    @endforeach
                    </select>
                  </div>
                {{-- <div class="form-group">
                    <label for="projects_id">類別</label>
                    <input type="text" class="form-control" id="projects_id"  name="projects_id" required>
                </div> --}}
                <div class="form-group">
                    <label for="img">圖片</label>
                    <input type="file" class="form-control" id="img"  name="img" required>
                </div>
                <div class="form-group">
                    <label for="sort">權重</label>
                    <input type="number" class="form-control" id="sort"  name="sort"  required>
                </div>
                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <input type="text" class="form-control" id="content" name="content" required>
                </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
//     $(document).ready(function() {
//   $('#payload').summernote();
// });
</script>
@endsection

