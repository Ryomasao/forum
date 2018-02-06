@extends('layouts.app')
@section('content')
<div class="container justfy-center">
    <!--Submitのデフォルトイベントをキャンセルして、VueインスタンスのonSubmitメソッドを呼ぶ-->
    <p>このページはpromiseの勉強もかねていた気がする</p>
    <form class="simple-form" action="/thread" method="post" v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" v-on:drop.prevent v-on:dragover.prevent>
        {{csrf_field()}}
        <div class="img-wrapper">
            <img src="/img/buta.png">
        </div>
       <div class="simple-form__group">
            <label class="simple-form__title" for="title">タイトル</label> 
            <!-- v-modelで、フォームのinput系(select、textareaとかも)の要素とVueインスタンスの変数をバインディングする -->
            <input class="simple-form__input" type="text" name="title" v-model="form.title">
       </div>
       <div class="simple-form__group">
            <p class="simple-form__error" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></p> 
       </div>
       <div class="simple-form__group">
            <label class="simple-form__title" for="title" >本文</label> 
            <input class="simple-form__input" type="text" name="body" v-model="form.body">
       </div>
       <div class="simple-form__group">
            <p class="simple-form__error" v-if="form.errors.has('body')" v-text="form.errors.get('body')"></p> 
       </div>
       <div class="simple-form__group">
            <label class="simple-form__title" for="title" >ファイル</label> 
            <div class="file">
                <label> ファイルを選択またはドロップ
                    <input class="file-hidden" type="file" name="file" style="display:none" @change="onDrop">
                </label>
                <p class="file__supplement">※ドロップはどこかで</p>
            </div>
       </div>
       <div class="simple-form__footer">
            <button class="simple-form__submit-btn">Test</button>
       </div>
    </form>
</div>
@endsection
@section('script')
<script src="{{ asset('js/app.js') }}"></script>
@endsection