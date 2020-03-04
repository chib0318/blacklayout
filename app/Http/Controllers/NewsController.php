<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $all_news = News::all();
        return view('admin/news/index',compact('all_news'));
    }

    public function create(){
        return view('admin/news/create');
    }


    public function store(Request $request){
       $news_data = $request->all();

       //上傳檔案

       $file_name = $request->file('connection')->store('','public');
       $news_data['connection'] = $file_name;

       News::create($news_data)->save();
        return redirect('/admin/news/index');
    }

    public function edit($id){
        $news =News::find($id);
        return view('admin/news/edit',compact('news'));
    }
    public function update(Request $request,$id){

        News::find($id)->update($request->all());
         return redirect('/admin/news/index');
     }
     public function delete(Request $request,$id){
        News::find($id)->delete();
        return redirect('/admin/news/index');
     }
}
