@extends('layouts/app')
@section('content')



    <div class="container">

        <form method="POST" action="/home/news/update/{{$news->id}}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="connection">現有圖片</label>
                <hr>
            <img class="img-fluid" width="250" src="{{$news->connection}}">
            </div>
            <div class="form-group">
                <label for="connection">重新上傳圖片</label>
                <input type="file" class="form-control" id="connection"  name="connection" value="{{$news->connection}}" >
            </div>
            <div class="form-group">
                <label for="queue">title</label>
                <input type="text" class="form-control" id="queue"  name="queue" value="{{$news->queue}}" >
            </div>
            <div class="form-group">
                <label for="payload">main</label>
                <input type="text" class="form-control" id="payload" name="payload" value="{{$news->payload}}">
            </div>
            <div class="form-group">
                <label for="sort">sort</label>
                <input type="number" class="form-control" id="sort" name="sort">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


