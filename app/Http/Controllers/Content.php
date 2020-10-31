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
        return view('content', ['content' => Thread::findOrFail($id)]);
    }
}
