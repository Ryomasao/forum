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

    /**
     * 
     */
    public function create_ajax()
    {
        Log::debug("I'm ThreadController@create_ajax");
        return view('thread.create_ajax');
    }

    public function store(ThreadRequest $request, Thread $thread)
    {


        Log::debug("I'm ThreadController@store");

        $title = $request->title;
        $body = $request->body;
        $user_id = 1;

        $thread->create([
            'title' => $title,
            'body' => $body,
            'user_id' => $user_id,
        ]);

        //return redirect('/thread');
        return 'success!';
    }
    
}

