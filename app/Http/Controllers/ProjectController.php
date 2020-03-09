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
        $all_type = Projects::all();
        return view('admin/project/index2',compact('all_type'));
    }

    public function create(){
        return view('admin/project/create');
    }
    public function create2(){
        return view('admin/project/create2');
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

     public function update(Request $request,$id){
        $project_data = $request->all();
        $item = Projects_types::find($id);

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

        //多張圖片
           if($request->hasFile('imgs')){
               $files = $request->file('imgs');
               foreach ($files as $file) {

                   //上傳圖片
                   $path = $this->fileUpload($file,'product');

                   //建立News多張圖片的資料
                   $news_imgs = new News_img;
                   $news_imgs->news_id = $item['id'];
                   $news_imgs->img = $path;
                   $news_imgs->save();
               }
           }

       

            $item->update($news_data);
        return redirect('/admin/news/index');
        // News::find($id)->update($request->all());
        //  return redirect('/admin/news/index');
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
