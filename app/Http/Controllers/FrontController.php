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
    public function news_datail($id){
        $news_imgs=News::find($id)->aaa;
        return view('front/news_detail',compact('news_imgs'));
    }

    public function product(){

        return view('front/product');
    }

}
