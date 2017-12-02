@extends('layouts.app')
@section('content')
<div class="container">
    <h1>This is Thread's Detail!</h1>
        <div class="thread">
            <h1> {{ $thread->title }} </h1>
            <p> {{ $thread->body }} </p>
        </div>
    </div>
</div>
@endsection