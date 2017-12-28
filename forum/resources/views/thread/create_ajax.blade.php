@extends('layouts.app')
@section('content')
<div class="container justfy-center">
    <!--Submitのデフォルトイベントをキャンセルして、VueインスタンスのonSubmitメソッドを呼ぶ-->
    <form class="simple-form" action="/thread" method="post" v-on:submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" v-on:drop.prevent v-on:dragover.prevent>
        {{csrf_field()}}
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
            <label class="simple-form__title" >ファイル</label> 
            <drop><drop>
       </div>
       <div class="simple-form__group">
            <p class="simple-form__error" v-if="form.errors.has('body')" v-text="form.errors.get('body')"></p> 
       </div>
       <div class="simple-form__group">
            <label class="simple-form__title" >URL</label> 
            <input class="simple-form__input" type="text" name="url" v-model="target">
       </div>
       <div class="simple-form__footer">
            <!--試しに、titleの値を変更するmethod、changeTitleをボタンクリックのイベントでよんでみる -->
            <button type="button" class="simple-form__submit-btn" v-on:click="get">get!</button>
            <button type="button" class="simple-form__submit-btn" v-on:click="post">post!</button>
            <button type="button" class="simple-form__submit-btn" v-on:click="xhr">xhr!</button>
            <button class="simple-form__submit-btn">Post</button>
       </div>
    </form>
</div>
@endsection