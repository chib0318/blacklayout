@extends('layouts/app')

@section('css')
<style>
    .news_img_card .btn-danger{
        position: absolute;
        right: -5px;
        top: -15px;
        border-radius: 50%;
    }
    .aa{
        width: 100%;
    }
</style>


@endsection

@section('content')



    <div class="container">

        <form method="POST" action="/home/project/update2/{{$all_type->id}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="types_id">類別</label>
                    <select class="form-control" id="types_id" name="types_id">
                    @foreach ($types as $item)

                        @if ($item->id == $all_type->types_id)

                    <option value="{{$item->id}}" selected>
                        {{$item->types}}
                    </option>
                    @else
                        <option value="{{$item->id}}"> {{$item->types}}</option>
                        @endif

                    @endforeach
                    </select>
                  </div>
            <div class="form-group">
                <label for="img">現有圖片</label>
                <hr>
            <img class="img-fluid" width="250" src="{{$all_type->img}}">
            </div>
            <input type="file" class="form-control" id="img"  name="img" value="{{$all_type->img}}" >

            <div class="form-group">
                <label for="sort">title</label>
                <input type="text" class="form-control" id="sort"  name="sort" value="{{$all_type->sort}}" >
            </div>
            <div class="form-group">
                <label for="title">main</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$all_type->title}}">
            </div>
            <div class="form-group">
                <label for="content">sort</label>
                <input type="number" min="0" class="form-control" id="content" name="content" value="{{$all_type->content}}">
            </div>
            <div class="form-group">
                <label for="price">價錢</label>
                <input type="number" min="0" class="form-control" id="price" name="price" value="{{$all_type->price}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $('.news_img_card .btn-danger').click(function(){

         var newsimgid =  this.getAttribute('data-newsimgid');

        $.ajax({
                  url: "/home/ajax_delete_news_imgs",
                  method: 'post',
                  data: {
                    newsimgid: newsimgid,
                  },
                  success: function(result){
                    $(`.col-2[data-newsimgid=${newsimgid}]`).remove();

                  }
            });
    });
    function ajx_post_sorrt(iam,id){
        // console.log(iam.value);
        var id;
        var sort_value = iam.value;
        $.ajax({
                  url: "/home/ajx_post_sorrt",
                  method: 'post',
                  data: {
                    id: id,
                    sort_value:sort_value,
                  },
                  success: function(result){
                   console.log(result);
                  }
            });
    }

    </script>
@endsection

