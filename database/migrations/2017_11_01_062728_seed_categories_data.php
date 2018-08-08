<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    public function up()
    {
        $categories = [
            [
                'name'        => '分享',
                'description' => '分享快乐，分享发现',
            ],
            [
                'name'        => '问答',
                'description' => '请保持友善，互帮互助',
            ],
            [
                'name'        => '教程',
                'description' => '游戏指南，LPC编程',
            ],
            [
                'name'        => '下载',
                'description' => 'MUD相关下载，包括LIB分享',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
}