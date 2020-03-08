
@extends('layout/nav')
@section('content')

<section class="engine"><a href="https://mobirise.info/x">css templates</a></section><section class="features3 cid-rRF3umTBWU m100" id="features3-7">




    <div class="container">
        <div class="media-container-row">
           title:{{$news->id}}
           <br>
           多張圖片:
           <br>
        @foreach ($news->news_imgs as $news_img)

        <img width="150" src="{{$news_img->img}}" alt="">
         @endforeach
`

        </div>
    </div>
</section>

@endsection
