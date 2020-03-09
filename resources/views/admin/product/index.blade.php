@extends('layouts/app')

@section('content')



    <div class="container">
        <form method="POST" action="/home/news/store">
                @csrf

            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="title" name="title" >
            </div>

            <div class="form-group">
                <label for="img">img</label>
                <input type="text" class="form-control" id="img"  name="img"  >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


