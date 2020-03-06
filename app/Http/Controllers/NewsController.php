<?php

namespace App\Http\Controllers;
use App\News;
use App\News_img;
use App\NewsImgs;
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
       //上傳檔案

    //    $file_name = $request->file('connection')->store('','public');
    //    $news_data['connection'] = $file_name;

    $news_data = $request->all();

    if($request->hasFile('connection')) {
        $file = $request->file('connection');
        $path = $this->fileUpload($file,'product');

        $news_data['connection'] = $path;
    }
       $new_news =News::create($news_data);
     //多張圖片
        if($request->hasFile('imgs')){
            $files = $request->file('imgs');
            foreach ($files as $file) {

                //上傳圖片
                $path = $this->fileUpload($file,'product');

                //建立News多張圖片的資料
                $news_imgs = new News_img;
                $news_imgs->news_id = $new_news->id;
                $news_imgs->img = $path;
                $news_imgs->save();
            }
        }
        return redirect('/admin/news/index');
    }

    public function edit($id){
        $news =News::find($id);
        return view('admin/news/edit',compact('news'));
    }
    public function update(Request $request,$id){
        $news_data = $request->all();
        $item = News::find($id);
        //if有上傳新圖片
        if($request->hasFile('connection')) {
            //舊圖片刪除
            $old_image = $item->connection;
            File::delete(public_path().$old_image);
            //上傳新圖片
            $file = $request->file('connection');
            $path = $this->fileUpload($file,'product');
            $news_data['connection'] = $path;

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
        $old_image = $item->connection;
        if(file_exists(public_path().$old_image)){
            File::delete(public_path().$old_image);
        }

        $item->delete();
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
