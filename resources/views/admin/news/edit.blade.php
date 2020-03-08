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

        <form method="POST" action="/home/news/update/{{$news->id}}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="connection">現有圖片</label>
                <hr>
            <img class="img-fluid" width="250" src="{{$news->connection}}">
            </div>
            <input type="file" class="form-control" id="connection"  name="connection" value="{{$news->connection}}" >
            <div class="form-group">
                <label for="connection">重新上傳圖片</label>
                <hr>
                <label for="connection">現有多張圖片</label>
                <div class="row">
                    @foreach ($news->news_imgs as $item)
                    <div class="col-2" data-newsimgid="{{$item->id}}">
                        <div class="news_img_card">
                            <button type="button" class="btn btn-danger" data-newsimgid="{{$item->id}}">X</button>
                            <img class="img-fluid" src="{{$item->img}}" alt="">
                            <input class="from-control  aa" type="text" value="{{$item->sort}}" onchange="ajx_post_sorrt(this,{{$item->id}})">
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
                <input type="file" class="form-control" id="imgs"  name="imgs[]"  multiple>
                <label for="connection">重新上傳圖片</label>

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
                <input type="number" min="0" class="form-control" id="sort" name="sort" value="{{$news->sort}}">
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

