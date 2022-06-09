<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class Content extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $thread = Thread::findOrFail($id);
        // logger("thread",$thread->cache);
        $thread->loadMissing('content');
        $thread->update(['cache->views_count' => $thread->cache['views_count'] + 1]);

        return view('content', ['thread' => $thread]);
    }
}
