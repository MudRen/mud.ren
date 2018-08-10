<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('mud:cache_user', function () {
    $files = \Storage::disk('mud')->allFiles('user');
    //dd($files);
    $users = [];
    foreach ($files as $file) {
        $id = $file;
        if (str_contains($file, '/.'))
            continue;
        while (str_contains($id, '/'))
            $id = str_after($id, '/');
        $id = str_before($id, '.');
        $file = \Storage::disk('mud')->get($file);
        $file = iconv('GBK', 'UTF-8//IGNORE', $file);
        $file = explode("\n", $file);
        foreach ($file as $info) {
            $keys = ['alias', 'killer', 'want_kills', 'dbase', 'skills', 'skill_map', 'autoload'];
            foreach ($keys as $key) {
                if (starts_with($info, $key)) {
                    $info = str_replace($key, '', $info);
                    $info = str_replace("([", "{", $info);
                    $info = str_replace("])", "}", $info);
                    $info = str_replace(",}", "}", $info);
                    $info = str_replace("({", "[", $info);
                    $info = str_replace("})", "]", $info);
                    $user[$id][$key] = $info;
                }
            }
        }
        \Cache::forever('user:'.$id, $user);
        $users += $user;
    }
    \Cache::forever('users', $users);
    $this->comment("玩家数据缓存成功，共".count($users)."位角色^_^");
})->describe('缓存MUD玩家数据');
