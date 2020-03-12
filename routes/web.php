<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontController@index' );

Route::get('/news','FrontController@news' );//list page
Route::get('/news/{id}','FrontController@news_detail' );//content page
Route::get('/product','FrontController@product' );
Route::get('/project','FrontController@project' );//產品頁面
Route::get('/cast','FrontController@cast' );
Route::get('/product_types','FrontController@product_types' );//產品多樣頁面
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/news/index','NewsController@index');


Route::get('/home/news/create','NewsController@create');

Route::post('/home/news/store','NewsController@store');
Route::get('/admin/news/edit/{id}', 'NewsController@edit');

Route::post('/home/news/update/{id}','NewsController@update');
Route::post('/home/news/delete/{id}','NewsController@delete');

Route::post('/home/ajax_delete_news_imgs','NewsController@ajax_delete_news_imgs');
Route::post('/home/ajx_post_sorrt','NewsController@ajx_post_sorrt');
Route::post('/home/ajax_delete_news_imgs','NewsController@ajax_delete_news_imgs');
Route::post('/home/ajx_post_sorrt','NewsController@ajx_post_sorrt');

//產品類別頁面
Route::get('/admin/project/index','ProjectController@index');


Route::get('/home/project/create','ProjectController@create');

Route::post('/home/project/store','ProjectController@store');
Route::get('/admin/project/edit/{id}', 'ProjectController@edit');

Route::post('/home/project/update/{id}','ProjectController@update');
Route::post('/home/project/delete/{id}','ProjectController@delete');
//產品管理頁面
Route::get('/admin/project/index2','ProjectController@index2');


Route::get('/home/project/create2','ProjectController@create2');

Route::post('/home/project/store2','ProjectController@store2');
Route::get('/admin/project/edit2/{id}', 'ProjectController@edit2');

Route::post('/home/project/update2/{id}','ProjectController@update2');
Route::post('/home/project/delete2/{id}','ProjectController@delete2');



// Route::get('','ProductController@index');


// Route::get('','ProductController@create');

// Route::post('','ProductController@store');
// Route::get('', 'ProductController@edit');

// Route::post('','ProductsController@update');
// Route::post('','ProductController@delete');

