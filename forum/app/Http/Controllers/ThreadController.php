<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index(Thread $thread)
    {
        $threads = $thread->all();
        return view('thread.index', compact('threads'));
    }

}

