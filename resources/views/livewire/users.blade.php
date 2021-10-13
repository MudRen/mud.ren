<div class="text-center alert alert-info">
    <h1> {{ $message }} </h1>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="https://bbs.mud.ren/">社区</a></li>
        <li class="breadcrumb-item"><a href="https://bbs.mud.ren/nodes/6/">炎黄</a></li>
        <li class="breadcrumb-item active" aria-current="page">英雄榜</li>
    </ol>
</nav>
<div class="table-responsive">
<table class="table table-striped table-dark table-hover table-sm">
    <thead>
        <tr>
            <th>排名</th>
            <th>ID</th>
            <th>姓名</th>
            <th>年龄</th>
            <th>title</th>
            <th>师父</th>
            <th>气血</th>
            <th>精气</th>
            <th>内力</th>
            <th>精力</th>
            <th>经验</th>
            <th>杀敌</th>
            <th>死亡</th>
            <th>最近登录</th>
        </tr>
    </thead>

    <tbody>
@foreach ($users as $user)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->age}}</td>
        <td>{{$user->title}}</td>
        <td>{{$user->master}}</td>
        <td>{{$user->qi}}</td>
        <td>{{$user->jing}}</td>
        <td>{{$user->neili}}</td>
        <td>{{$user->jingli}}</td>
        <td>{{$user->combat_exp}}</td>
        <td>{{$user->kill}}</td>
        <td>{{$user->die}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
    </tr>
@endforeach
    </tbody>
</table>
</div>
