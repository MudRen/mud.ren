<div class="text-center">
    <h1> {{ $message }} </h1>
</div>
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
    @continue(!data_get(json_decode($user, true), 'id'))
    <tr>
        <td>{{ data_get(json_decode($user, true), 'name') }}（{{ data_get(json_decode($user, true), 'id') }}）</td>
        <!-- <td>{{ data_get(json_decode($user, true), 'gender') }}</td> -->
        <!-- <td>{{ data_get(json_decode($user, true), 'character') }}</td> -->
        <td>{{ data_get(json_decode($user, true), 'age') }}</td>
        <td>{{ data_get(json_decode($user, true), 'title') }}</td>
        <td>{{ data_get(json_decode($user, true), 'family.master_name') }}</td>
        <td>{{ data_get(json_decode($user, true), 'max_qi') }}</td>
        <td>{{ data_get(json_decode($user, true), 'max_jing') }}</td>
        <td>{{ data_get(json_decode($user, true), 'max_neili') }}</td>
        <td>{{ data_get(json_decode($user, true), 'max_jingli') }}</td>
        <td>{{ data_get(json_decode($user, true), 'combat_exp') }}</td>
        <td>{{ data_get(json_decode($user, true), 'weiwang') }}</td>
        <td>{{ data_get(json_decode($user, true), 'shen') }}</td>
        <td>{{ data_get(json_decode($user, true), 'combat.MKS') }}</td>
        <td>{{ data_get(json_decode($user, true), 'combat.dietimes') }}</td>
    </tr>
@endforeach
    </tbody>
</table>
</div>
