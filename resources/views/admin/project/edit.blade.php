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

        <form method="POST" action="/home/project/update/{{$projects->id}}" enctype="multipart/form-data">
                @csrf

            <div class="form-group">
                <label for="types">類別</label>
                <input type="text" class="form-control" id="types"  name="types" value="{{$projects->types}}" >
            </div>
            <div class="form-group">
                <label for="sort">sort</label>
                <input type="text" class="form-control" id="sort" name="sort" value="{{$projects->sort}}">
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

