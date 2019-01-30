@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="300px"
                                 height="300px">
                        </div>
                        <div class="media-body">
                            <hr>
                            <h4><strong>个人简介</strong></h4>
                            <p>{{ $user->introduction }}</p>
                            <hr>
                            <h4><strong>注册于</strong></h4>
                            <p>{{ $user->created_at->diffForHumans() }}</p>
                            <hr>
                            <h4><strong>最后活跃</strong></h4>
                            <p title="{{  $user->last_actived_at }}">{{ $user->last_actived_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if($user->dbase())
                        <h1 class="panel-title" style="font-size:30px;">{{ $user->dbase()->name}}
                            <small>{{ $user->dbase()->title }}({{ $user->dbase()->age }}岁)</small>
                        </h1>
                        @isset($user->dbase()->born)
                        <div>
                            <p>膂力：[{{ $user->dbase()->str }}] 悟性：[{{ $user->dbase()->int }}]
                                根骨：[{{ $user->dbase()->con }}] 身法：[{{ $user->dbase()->dex }}]</p>
                            <p>{{ $user->dbase()->gender }}，{{ $user->dbase()->born }}，天性{{ $user->dbase()->character }}。</p>
                            @isset($user->dbase()->combat)
                            <p>
                                目前为止总共到黑白无常那里串门{{ $user->dbase()->combat->dietimes }}次，最后一次是{{ $user->dbase()->combat->last_die }}。

                            </p>
                            @endisset
                        </div>
                        @endisset
                    @else
                        <div class="alert alert-success">梦幻泥潭MUD游戏地址 mud.ren:5555</div>
                    @endif
                </div>
            </div>
            <hr>

            {{-- 用户发布的内容 --}}
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="{{ active_class(if_query('tab', null)) }}">
                            <a href="{{ route('users.show', $user->id) }}">Ta 的话题</a>
                        </li>
                        <li class="{{ active_class(if_query('tab', 'replies')) }}">
                            <a href="{{ route('users.show', [$user->id, 'tab' => 'replies']) }}">Ta 的回复</a>
                        </li>
                    </ul>
                    @if (if_query('tab', 'replies'))
                        @include('users._replies', ['replies' => $user->replies()->with('topic')->recent()->paginate(5)])
                    @else
                        @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])
                    @endif
                </div>
            </div>

        </div>
    </div>
@stop