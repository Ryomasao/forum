<?php


Route::get('/', function () {
    return view('welcome');
});

//Threadの一覧を表示する
Route::get('/thread', 'ThreadController@index');
