<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ReplyRequest $request, Reply $reply)
    {
        $reply->content = $request->content;
        $reply->user_id = Auth::id();
        $reply->topic_id = $request->topic_id;
        $reply->save();

        return redirect()->to($reply->topic->link())->with('sucess', '回复创建成功！');
    }

    public function destroy(Reply $reply)
    {
        try {
            $this->authorize('destroy', $reply);
        } catch (AuthorizationException $e) {
        }
        try {
            $reply->delete();
        } catch (\Exception $e) {
        }

        return redirect()->to($reply->topic->link())->with('success', '成功删除回复！');
    }
}