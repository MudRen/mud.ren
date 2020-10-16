<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $connection = 'mybbs';

    /**
     * 获取此评论的作者
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 获取此评论的内容
     */
    public function content()
    {
        return $this->morphOne(Content::class, 'contentable');
    }

    /**
     * 获取拥有此评论的模型
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
