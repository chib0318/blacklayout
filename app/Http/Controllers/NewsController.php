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

    //    $file_name = $request->file('connection')->store('','public');
    //    $news_data['connection'] = $file_name;


    if($request->hasFile('connection')) {
        $file = $request->file('connection');
        $path = $this->fileUpload($file,'product');

        $news_data['connection'] = $path;
    }
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

        if($request->hasFile('connection')) {
            $old_image = $item->img;
            $file = $request->file('connection');
            $path = $this->fileUpload($file,'product');
            $news_data['connection'] = $path;
            File::delete(public_path().$old_image);
        }
        // if($request->hasFile('connection')){
        //     //刪除
        //     $old_img = $item->connection;
        //     Storage::disk('public')->delete($old_img);
        //     //重新上傳
            // $file_name = $request->file('connection')->store('','public');
            // $news_data['connection'] = $file_name;

            // News::create($news_data)->save();

            $item->update($news_data);
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
     private function fileUpload($file,$dir){
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if( ! is_dir('upload/')){
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if ( ! is_dir('upload/'.$dir)) {
            mkdir('upload/'.$dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time().md5(rand(100, 200))).'.'.$extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path().'/upload/'.$dir.'/'.$filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/'.$dir.'/'.$filename;
    }
}
