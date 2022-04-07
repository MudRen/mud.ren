<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes, HasFactory;

    protected $connection = 'mybbs';

    /**
     * 获取此文章的作者
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 获取此文章的话题分类
     */
    public function node()
    {
        return $this->belongsTo(Node::class);
    }

    /**
     * 获取此文章的内容
     */
    public function content()
    {
        return $this->morphOne(Content::class, 'contentable');
    }

    /**
     * 获取此文章的所有评论
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
