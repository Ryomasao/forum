<h1>This is Thread!</h1>

<ul>
    @foreach($threads as $thread)
        <li>{{ $thread->title }}</li>
        <li>{{ $thread->body }}</li>
        <hr/>
    @endforeach
</ul>