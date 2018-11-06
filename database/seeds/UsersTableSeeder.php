<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 头像假数据
        $avatars = [
            'https://via.placeholder.com/200x200/333/333',
            'https://via.placeholder.com/200x200/339/339',
            'https://via.placeholder.com/200x200/393/393',
            'https://via.placeholder.com/200x200/399/399',
            'https://via.placeholder.com/200x200/933/933',
            'https://via.placeholder.com/200x200/939/939',
            'https://via.placeholder.com/200x200/993/993',
            'https://via.placeholder.com/200x200/999/999',
            ];

        // 生成数据集合
        $users = factory(User::class)->times(10)->make()->each(function ($user, $index) use ($faker, $avatars) {
                // 从头像数组中随机取出一个并赋值
                $user->avatar = $faker->randomElement($avatars);
            });

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible([
            'password',
            'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'ivy';
        $user->email = 'i@mud.ren';
        $user->avatar = 'https://avatars3.githubusercontent.com/u/13300261?s=460&v=4';
        $user->save();

        // 将 1 号用户指派为『站长』
        $user->assignRole('Founder');

        $user = User::find(2);
        $user->name = 'iuv';
        $user->email = 'i@oiuv.cn';
        $user->save();

        // 将 2 号用户指派为『管理员』
        $user->assignRole('Maintainer');

    }
}
