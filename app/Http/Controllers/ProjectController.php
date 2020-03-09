<?php

namespace App\Http\Controllers;
use App\Projects;
use App\Projects_types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index(){
        $all_news = Projects::all();
        return view('admin/project/index',compact('all_news'));

    }
    public function index2(){
        $all_type = Projects_types::all();
        return view('admin/project/index2',compact('all_type'));
    }

    public function create(){
        return view('admin/project/create');
    }
    public function create2(){
        return view('admin/project/create2');
    }

    public function store(Request $request,$id){


     $news_data = $request->all();
        
     $item = Projects_types::find($id);

     $item->update($news_data);
         return redirect('/admin/project/index');
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
