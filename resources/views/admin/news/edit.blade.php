@extends('layouts/app')
@section('content')



    <div class="container">

        <form method="POST" action="/home/news/update/{{$news->id}}">
                @csrf
            <div class="form-group">
                <label for="connection">img</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="connection" name="connection" value="{{$news->connection}}">
            </div>
            <div class="form-group">
                <label for="queue">title</label>
                <input type="text" class="form-control" id="queue"  name="queue" value="{{$news->queue}}" >
            </div>
            <div class="form-group">
                <label for="payload">main</label>
                <input type="text" class="form-control" id="payload" name="payload" value="{{$news->payload}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


