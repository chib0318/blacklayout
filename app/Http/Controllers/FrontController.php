<?php

namespace App\Http\Controllers;

use DB;
use App\News;
use App\Projects;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function project(){

        return view('front/project');
    }
    public function test_product_detial(){

        return view('front/test_product_detial');
    }


    public function add_cart($product_id)
    {

        $Product = Projects::find($product_id); // assuming you have a Product model with id, name, description & price
        $rowId = 456; // generate a unique() row ID
        $userID = Auth::user()->id;
         // the user ID to bind the cart contents

        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $Product->title,
            'price' => $Product->price,
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => $Product

        ));



        // return view('front/test_product_detial');
    }

    public function cart_total()

    {
        $userID = Auth::user()->id;
        $items = \Cart::session($userID)->getContent();
        return view('front/cart',compact('items'));


    }
}
