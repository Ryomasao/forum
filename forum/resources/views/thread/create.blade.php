@extends('layouts.app')
@section('content')
<div class="container justfy-center">
    <form class="form" action="/thread" method="post">
        {{ csrf_field() }}
        <h2 class="form__header">何かを投稿しよう</h2>
        <div class="form__row">
            <div class="form__input">
                <label class="form__title" for="title">タイトル</label>
                <div class="form__controls">
                    <input class="form__control" type="text" name="title">
                </div>
            </div>
            @if($errors->has('title'))
            <div class="form__error">
                <label class="form__notify">{{ $errors->first('title') }}</label>
            </div>
            @endif
        </div>
        <div class="form__row">
            <div class="form__input">
                <label class="form__title" for="body">本文</label>
                <div class="form__controls">
                    <textarea class="form__control" name="body" rows="10" cols="50"></textarea>
                </div>
            </div>
            @if($errors->has('title'))
            <div class="form__error">
                <label class="form__notify">{{ $errors->first('body') }}</label>
            </div>
            @endif
        </div>
        <div class="form__row">
            <div class="form__input">
                <label class="form__title" for="title">ユーザーID</label>
                <div class="form__controls">
                    <input class="form__control" type="text" name="user_id">
                </div>
            </div>
        </div>
        <div class="form__footer">
            <button class="form__control">投稿する</button>
        </div>
    </form>

</div>
@endsection