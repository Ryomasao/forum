@extends('layouts.app')
@section('content')
<div class="container justfy-center">
    <form class="form">
        <h2 class="form__header">ファイルアップロード</h2>
        <div class="img-wrapper">
            <h3>解説のぶたさん</h3>
            <img src="/img/buta.png">
        </div>
        <div class="form__row">
            <div class="form__input">
                <label class="form__title" for="title">タイトル</label>
                <div class="form__controls">
                    <input class="form__control" type="text" name="title" v-model="title">
                </div>
            </div>
        </div>
        <div class="form__row">
            <div class="form__input">
                <label class="form__title" for="title">ファイル</label>
                <div class="form__controls">
                    <drop @send-file="sendFile"></drop>
                </div>
            </div>
        </div>
       <div class="simple-form__footer">
            <button type="button" class="simple-form__submit-btn" @click="onSubmit">投稿する</button>
       </div>
    </form>
</div>
@endsection
@section('script')
<script src="{{ asset('js/main.js') }}"></script>
@endsection