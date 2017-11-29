@extends('layouts.app')
@section('content')
<div class="container">
    <h1>This is Thread!</h1>
    <div class="threads">
        @foreach($threads as $thread)
        <div class="thread">
            <h1> {{ $thread->title }} </h1>
            <p> {{ $thread->body }} </p>
        </div>
        @endforeach
    </div>
</div>
@endsection