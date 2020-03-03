@extends('layouts/app')
@section('content')



    <div class="container">
        <form method="POST" action="/home/news/store">
                @csrf
            <div class="form-group">
                <label for="connection">img</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="connection" name="connection" >
            </div>
            <div class="form-group">
                <label for="queue">title</label>
                <input type="text" class="form-control" id="queue"  name="queue"  >
            </div>
            <div class="form-group">
                <label for="payload">main</label>
                <input type="text" class="form-control" id="payload" name="payload">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


