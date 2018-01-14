<?php


Route::get('/', function () {
    return view('welcome');
});

//Threadの一覧を表示する
Route::get('/thread', 'ThreadController@index');

//Threadを投稿するページを表示する
Route::get('/thread/create', 'ThreadController@create');

//Threadを投稿するページを表示する(ajax)
Route::get('/thread/create_ajax', 'ThreadController@create_ajax');

//Threadを投稿する
Route::post('/thread', 'ThreadController@store')->middleware('seesession');

//Threadを表示する
Route::get('/thread/{thread}', 'ThreadController@show');

Route::get('/sample', function(){
    return 'ohanky!';
});

Route::get('/other', function(){
    return 'buhiii!';
});
