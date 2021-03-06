<?php

namespace App\Http\Controllers;
use App\Projects;
use App\Projects_types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index(){
        $all_project = Projects_types::all();
        return view('admin/project/index',compact('all_project'));

    }
    public function index2(){
        $products = Projects::all();
        $types =  Projects_types::all();
        return view('admin/project/index2',compact('products','types'));
    }

    public function create(){
        return view('admin/project/create');
    }
    public function create2(){
        $prodtypes = Projects_types::all();
        return view('admin/project/create2',compact('prodtypes'));
    }

    public function store(Request $request){
        //第一種
        // $flight = new Projects_types;
        // $flight->types = $request->types;
        // $flight->sort = $request->sort;
        // $flight->save();
        //第2種
        $news_data = $request->all();
        Projects_types::create($news_data)->save();

         return redirect('admin/project/index');
     }

     public function store2(Request $request){
        //上傳檔案
     $project_data = $request->all();

     if($request->hasFile('img')) {

         $file = $request->file('img');
         $path = $this->fileUpload($file,'products');

         $project_data['img'] = $path;
     }
        Projects::create($project_data)->save();
         return redirect('/admin/project/index2');
     }

     public function edit($id){

        $projects =Projects_types::find($id);
        return view('admin/project/edit',compact('projects'));
    }
    public function edit2($id){

       $all_type = Projects::find($id);
        // dd( $all_type);
        $types =  Projects_types::all();

        return view('admin/project/edit2',compact('all_type','types'));

    }
     public function update(Request $request,$id){
        $project_data = $request->all();
        $item = Projects_types::find($id);

            $item->update($project_data);
        return redirect('/admin/project/index');
        // News::find($id)->update($request->all());
        //  return redirect('/admin/news/index');
     }
     public function update2(Request $request,$id){
        $news_data = $request->all();
        $item = Projects::find($id);
        //if有上傳新圖片
        if($request->hasFile('img')) {

            //舊圖片刪除
            $old_image = $item->img;
            File::delete(public_path().$old_image);
            //上傳新圖片
            $file = $request->file('img');
            $path = $this->fileUpload($file,'products');
            $news_data['img'] = $path;

        }

            $item->update($news_data);
        return redirect('/admin/project/index2');
     }

     public function delete($id){

        $item = Projects_types::find($id);
        $item->delete();


        return redirect('/admin/project/index');

     }
     public function delete2($id){

        $item = Projects::find($id);

        // dd($item);
        $old_image = $item->img;
        // dd($old_image);
        if(file_exists(public_path().$old_image)){
            File::delete(public_path().$old_image);
        }

        $item->delete();

        return redirect('/admin/project/index2');

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
