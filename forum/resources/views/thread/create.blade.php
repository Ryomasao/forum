@extends('layouts.app')
@section('content')
<div class="container justfy-center">
    <form class="form" action="/thread" method="post">
        {{ csrf_field() }}
        <h2 class="form-header">何かを投稿しよう</h2>
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title">
        </div>
        <div class="form-group">
            <label for="body">本文</label>
            <textarea name="body" rows="10" cols="50"></textarea>
        </div>
        <div class="errors">
            @if($errors->has('body'))
                <p> {{ $errors->first('body') }} </p>
            @endif
        </div>
        <div class="form-group">
            <label for="user_id">ユーザーID</label>
            <input type="text" name="user_id" placeholder="とりあえずの実装">
        </div>
        <div class="form-group">
            <button>投稿する</button>
        </div>
    </form>

</div>
@endsection