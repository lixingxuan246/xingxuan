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
// //闭包路由
// Route::get('/', function () {
//     $name="1908李";
//     return view('welcome',['name'=>$name]);
// });


// Route::get('/add','UserController@index');

// Route::post('/adddo','UserController@insert')->name('do');


// Route::get('show',function(){
//     echo '这里是商品详情页';
// });


// Route::get('/show/{id?}/{name?}',function($id,$name = null){


//     return view('add.adddo',['id'=>$id,'name'=>$name]);
// })->where('name','[a-z]+');

// // Route::view('show','add.adddo',);


// Route::get('/brand','UserController@index');

// // Route::get('/category/{fid?}',function($fid = null){

// //     return view('add/type',['fid'=>$fid]);
// // });

// Route::prefix('people')->middleware('checklogin')->group(function(){
//         Route::get('/','PeopleController@index');
//         Route::get('/create','PeopleController@create');
//         Route::post('/store','PeopleController@store');

//         Route::get('edit/{id}','PeopleController@edit');
//         Route::post('/update/{id}','PeopleController@update');
//         Route::get('/destroy/{id}','PeopleController@destroy');
// });


// Route::get('/laravel','PeopleController@create');
// Route::get('/study','StudyController@index');

// Route::post('/study/insert','StudyController@store');

// Route::get('/study/create','StudyController@create');
// Route::get('/study/edit/{id}','StudyController@edit');
// Route::post('/study/update/{id}','StudyController@update');
// Route::get('/study/destroy/{id}','StudyController@destroy');


// Route::view('/login','people/login');
// Route::get('/logindo','LoginController@logindo');

// ->middleware('articlelogin')
Route::prefix('article')->group(function(){
    Route::get('/','ArticleController@index');
    Route::post('/store','ArticleController@store');
    Route::get('/create','ArticleController@create');
    Route::get('/edit/{id}','ArticleController@edit');
Route::post('/update/{id}','ArticleController@update');
Route::get('/destroy/{id}','ArticleController@destroy');

});

// Route::post('article/checkOnly','ArticleController@checkOnly');


// Route::get('category/index','CategoryController@index');

// Route::get('category/create','CategoryController@create');
// Route::post('category/store','CategoryController@store');
// Route::get('category/destroy/{id}','CategoryController@destroy');
// Route::get('category/index','CategoryController@index');

// Route::prefix('regulate')->group(function(){
//     Route::get('/','RegulateController@create');
//     Route::post('/store','RegulateController@store');
//     Route::get('/index','RegulateController@index');
//     Route::get('/destroy/{id}','RegulateController@destroy');


// });

// Route::prefix('manage')->group(function(){
//     Route::get('/','ManageController@create');
//     Route::post('/store','ManageController@store');
//     Route::get('/index','ManageController@index');
//     Route::get('/edit/{id}','ManageController@edit');
//     Route::post('/update/{id}','ManageController@update');


// });

Route::get('/','index\IndexController@index');
Route::get('/login','index\LoginController@index');
Route::get('/register','index\RegisterController@index');
Route::get('/register/create','index\RegisterController@create');
Route::get('/edit/{id}','index\IndexController@edit');
Route::get('/show/{id}','index\IndexController@show');

Route::post('/login/create','index\LoginController@create');

Route::get('/cookie','Index\LoginController@cookie');
Route::get('/qu','Index\LoginController@qu');
Route::get('/ajaxsend','Index\RegisterController@ajaxsend');
Route::get('/sendSms','Index\LoginController@sendSms');



    Route::prefix('cargo')->middleware('cargologin')->group(function(){
Route::get('/list','CargoController@list');


Route::get('/delete/{id}','CargoController@delete');
Route::post('/insert','CargoController@insert');
Route::get('/{id}','CargoController@index');
});
Route::get('/cargo/login','CargoController@login');
Route::post('/cargo/logindo','CargoController@logindo');


