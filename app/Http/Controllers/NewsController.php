<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        $news_data = $request->all();
        $item = News::find($id);


        if($request->hasFile('connection')){
            //刪除
            $old_img = $item->connection;
            Storage::disk('public')->delete($old_img);
            //重新上傳
            // $file_name = $request->file('connection')->store('','public');
            // $news_data['connection'] = $file_name;

            News::create($news_data)->save();
        }
        $item -> update($news_data);
        return redirect('/admin/news/index');
        // News::find($id)->update($request->all());
        //  return redirect('/admin/news/index');
     }
     public function delete($id){
        $item = News::find($id);
        $old_img = $item->connection;
        Storage::disk('public')->delete($old_img);
        News::find($id)->delete();
        return redirect('/admin/news/index');
     }
}
