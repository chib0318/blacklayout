<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\News;
class FrontController extends Controller
{
    public function index(){

        return view('front/index');
    }

    public function news(){

        $news_data = DB::table('news')->orderBy('sort','desc')->get(); 
        return view('front/news',compact('news_data'));
    }
    //
    public function news_detail($id){
        //方法1
        // $news_imgs =News::find($id)->news_imgs;
        //方法2
        // $news_imgs =News::find($id);
        // $imgs = News::where('news-id',$id)->get();
        //方法3
        $news =News::with('news_imgs')->find($id);
        return view('front.news_detail',compact('news'));

    }

    public function product(){

        return view('front/product');
    }

}
