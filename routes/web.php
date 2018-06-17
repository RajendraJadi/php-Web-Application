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

Route::get('/', function () {
    	return view('welcome');
   // return "rajendra is here";
});

Auth::routes();

Route::resource('/file','PostController');
Route::resource('/home/create','TableController');

Route::get('/home','TableController@create');
Route::post('/search', 'TableController@store');

Route::resource('/admin','AdminController');
Route::post('/admin/home', 'AdminController@home');
Route::get('/files', 'AdminController@create');
Route::post('/admin/list_users', 'AdminController@show');



Route::get('/email',function (){
    $data = [
      'title' => 'i am title',
        'content' => ' i am contecnt'

    ];

    Mail::send('posts.test',$data,function ($message){
        $message->to('rjadi@uncc.edu','raj')->subject('am subject');
    });
});
//Route:get('')

Route::resource('/add/store','AddMoreController');

//    //return view('welcome');
//    return "raj adminsdfsf is here";

//
//Route::get('/contact', function () {
//
//    return view('contact');
//    //return "raj adminsdfsf is here";
//});
//
////Route::get('post/{id}','PostController@show_post');
//
//Route::get('/posts', function () {
//
//    return view('posts.create');
//    //return "raj adminsdfsf is here";
//});
//
//
//
//
//Route::resource('/user','usercontroller2');
//

//
////Route::get('/home', 'HomeController@index')->name('home');
//
//
//
//Route::get('/insert',function(){
//	DB::insert('insert into posts(text,body) values(?,?)',['post test','post boday']);
//});

// Route::get('/read',function(){
// 	$result = DB::select('select * from posts where id= ?',[1]);
// 	// foreach($result as $posts)
// 	// 	return $posts->body;
// 	retrun var_dump($result);
// });