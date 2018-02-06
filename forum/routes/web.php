<?php


Route::get('/', function () {
    return view('index');
});

//Threadの一覧を表示する
Route::get('/thread', 'ThreadController@index')->name('threads');

//Threadを投稿するページを表示する
Route::get('/thread/create', 'ThreadController@create')->name('thread.create');

//Threadを投稿するページを表示する(ajax)
Route::get('/thread/create_ajax', 'ThreadController@create_ajax')->name('thread.create_ajax');

//Threadを投稿する
Route::post('/thread', 'ThreadController@store')->middleware('seesession');

//Threadを表示する
Route::get('/thread/{thread}', 'ThreadController@show');

//ファイルアップロード画面
Route::get('/file', 'FileController@index')->name('files');
Route::get('/file/create', 'FileController@create')->name('file.create');

//ファイルアップロード画面
Route::post('/file', 'FileController@store');


Route::get('/sample', function(){
    return 'ohanky!';
});

Route::get('/other', function(){
    return 'buhiii!';
});
