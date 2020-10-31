@extends('layouts.app')

@section('title', $content->title)

@section('content')
<h2 class="text-center mt-3">{{$content->title}}</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('threads')}}">首页</a></li>
        <li class="breadcrumb-item"><a href="https://bbs.mud.ren/nodes/{{$content->node->id}}">{{$content->node->title}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">内容</li>
    </ol>
</nav>
<div class="shadow-lg p-3 mb-3 bg-white rounded">
<div class="alert alert-success d-flex justify-content-between" role="alert">
<span>原文链接：<a href="https://bbs.mud.ren/threads/{{$content->id}}" class="alert-link">{{$content->title}}</a></span>
<span>作者：<a href="https://bbs.mud.ren/{{$content->author->username}}/">{{$content->author->name}}</a></span>
<span>发布时间：{{$content->published_at}}</span>
</div>
{!! $content->content->body !!}
</div>
@endsection

@push('scripts')
    <link href="https://cdn.bootcdn.net/ajax/libs/prism/1.22.0/themes/prism.min.css" rel="stylesheet">
    <script src="https://cdn.bootcdn.net/ajax/libs/prism/1.22.0/components/prism-core.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/prism/1.22.0/plugins/autoloader/prism-autoloader.min.js"></script>
@endpush
