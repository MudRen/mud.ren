
<div class="shadow-sm p-3 mb-3 g-white rounded">
    <input class="form-control mr-sm-2" type="search" placeholder="贴子按发布时间倒序，可在此输入关键字搜索..." aria-label="Search" wire:model="search">
<div class="list-group">
    @foreach ($threads as $thread)
    @php
        $cache = json_decode($thread->cache);
    @endphp
    <a href="{{asset('threads/'.$thread->id)}}" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">{{$thread->title}}</h5>
        <small class="text-muted"> {{$thread->published_at}} </small>
        </div>
        <span class="badge badge-primary badge-pill">{{$thread->node->title}}</span>
        <small class="text-muted"> 作者：{{$thread->author->name}} </small>
        <small> 阅读：{{$cache->views_count}} </small>
        <small class="text-muted"> 最后回复：{{$cache->last_reply_user_name?:'无'}}</small>

    </a>
    @endforeach
</div>
    {{ $threads->links() }}
</div>
