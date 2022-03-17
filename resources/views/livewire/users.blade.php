<div>
    <div class="text-center alert alert-info">
        <h1>炎黄英雄榜</h1>
    </div>
    <div class="table-responsive">
        <input class="form-control mr-sm-2" type="search" placeholder="可在此输入关键字搜索...（根据玩家经验排序）" aria-label="Search" wire:model="search">
        <table class="table table-striped table-dark table-hover table-sm">
            <thead>
                <tr>
                    <th></th>
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
        {{ $users->links() }}
    </div>
</div>
