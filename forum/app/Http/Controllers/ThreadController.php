<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Http\Requests\ThreadRequest;
use Illuminate\Support\Facades\Log;

class ThreadController extends Controller
{
    public function index(Thread $thread)
    {
        $threads = $thread->all();
        return view('thread.index', compact('threads'));
    }

    public function show(Thread $thread)
    {
        return view('thread.show', compact('thread'));
    }

    public function create()
    {
        //Log::debug("I'm ThreadController@create");
        return view('thread.create');
    }

    public function store(ThreadRequest $request, Thread $thread)
    {

        $thread->create($request->all());

        return redirect('/thread');
    }
    
}

