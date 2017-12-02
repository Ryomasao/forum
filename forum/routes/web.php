<?php


Route::get('/', function () {
    return view('welcome');
});

//Threadの一覧を表示する
Route::get('/thread', 'ThreadController@index');

//Threadを投稿するページを表示する
Route::get('/thread/create', 'ThreadController@create');

//Threadを投稿する
Route::post('/thread', 'ThreadController@store');

//Threadを表示する
Route::get('/thread/{thread}', 'ThreadController@show');

