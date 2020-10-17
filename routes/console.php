<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

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
    $users = [];
    foreach ($files as $file) {
        $id = $file;
        if (!Str::endsWith($file, '.o'))
            continue;
        while (Str::contains($id, '/'))
            $id = Str::after($id, '/');
        $id = Str::before($id, '.o');
        // dump($id);
        $file = \Storage::disk('mud')->get($file);
        $file = explode("\n", $file);
        foreach ($file as $info) {
            $keys = ['dbase', 'skills', 'skill_map'];
            foreach ($keys as $key) {
                if (Str::startsWith($info, $key)) {
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
        // dd($user);
        \Cache::forever('user:'.$id, $user);
        $users += $user;
    }
    // dd($users);
    \Cache::forever('users', $users);
    $this->comment("玩家数据缓存成功，共".count($users)."位角色^_^");
})->describe('缓存MUD玩家数据');
