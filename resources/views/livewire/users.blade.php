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
            <th>姓名</th>
            <!-- <th>性别</th> -->
            <!-- <th>性格</th> -->
            <th>年龄</th>
            <th>title</th>
            <th>师父</th>
            <th>气血</th>
            <th>精气</th>
            <th>内力</th>
            <th>精力</th>
            <th>经验</th>
            <th>威望</th>
            <th>正气</th>
            <th>杀敌</th>
            <th>死亡</th>
        </tr>
    </thead>

    <tbody>
@foreach ($users as $user)
    @php
        $dbase = json_decode($user, true);
    @endphp
    @continue(!data_get($dbase, 'id'))
    <tr>
        <td>{{ data_get($dbase, 'name') }}（{{ data_get($dbase, 'id') }}）</td>
        <!-- <td>{{ data_get($dbase, 'gender') }}</td> -->
        <!-- <td>{{ data_get($dbase, 'character') }}</td> -->
        <td>{{ data_get($dbase, 'age') }}</td>
        <td>{{ data_get($dbase, 'title') }}</td>
        <td>{{ data_get($dbase, 'family.master_name') }}</td>
        <td>{{ data_get($dbase, 'max_qi') }}</td>
        <td>{{ data_get($dbase, 'max_jing') }}</td>
        <td>{{ data_get($dbase, 'max_neili') }}</td>
        <td>{{ data_get($dbase, 'max_jingli') }}</td>
        <td>{{ data_get($dbase, 'combat_exp') }}</td>
        <td>{{ data_get($dbase, 'weiwang') }}</td>
        <td>{{ data_get($dbase, 'shen') }}</td>
        <td>{{ data_get($dbase, 'combat.MKS') }}</td>
        <td>{{ data_get($dbase, 'combat.dietimes') }}</td>
    </tr>
@endforeach
    </tbody>
</table>
</div>
