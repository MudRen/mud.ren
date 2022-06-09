@extends('layouts.app')

@section('title', $thread->title)

@section('content')
<h2 class="text-center mt-3">{{$thread->title}}</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('threads')}}">首页</a></li>
        <li class="breadcrumb-item"><a href="https://bbs.mud.ren/nodes/{{$thread->node->id}}">{{$thread->node->title}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">内容</li>
    </ol>
</nav>
<div class="shadow-lg p-3 mb-3 bg-white rounded">
<div class="alert alert-success d-flex justify-content-between" role="alert">
<span>原文链接：<a href="https://bbs.mud.ren/threads/{{$thread->id}}" class="alert-link">{{$thread->title}}</a></span>
<span>作者：<a href="https://bbs.mud.ren/{{$thread->author->username}}/">{{$thread->author->name}}</a></span>
<span>发布时间：{{$thread->published_at}}</span>
</div>
<div class="content">
{!! $thread->content->body !!}
</div>
<div class="alert alert-success d-flex justify-content-between" role="alert">
<span>原文链接：<a href="https://bbs.mud.ren/threads/{{$thread->id}}" class="alert-link">{{$thread->title}}</a></span>
<span>作者：<a href="https://bbs.mud.ren/{{$thread->author->username}}/">{{$thread->author->name}}</a></span>
<span>发布时间：{{$thread->published_at}}</span>
</div>
</div>
@endsection

@push('scripts')
    <style>
    .content img {
        max-width: 1000px;
    }
    .content table {
        display: block;
        width: 100%;
        overflow: auto;
    }
    .content table th{
        background-color: #333;
        color: #eee;
        padding: 5px;
    }
    .content table tr,td {
        padding: 5px;
        border: 1px solid #ccc;
    }
    .content pre {
        padding: 10px;
        background-color: #333;
        color: #eee;
        border-radius:5px;
    }
    .content blockquote{
        background-color: #eee;
        padding: 10px 8px 1px;
    }
    </style>
    <link href="https://cdn.bootcdn.net/ajax/libs/prism/1.22.0/themes/prism.min.css" rel="stylesheet">
    <script src="https://cdn.bootcdn.net/ajax/libs/prism/1.22.0/components/prism-core.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/prism/1.22.0/plugins/autoloader/prism-autoloader.min.js"></script>
@endpush
