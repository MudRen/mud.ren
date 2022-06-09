<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes, HasFactory;

    protected $connection = 'mybbs';
    protected $fillable = [
        'user_id', 'title', 'excellent_at', 'node_id',
        'pinned_at', 'frozen_at', 'banned_at', 'published_at', 'cache',
        'cache->views_count', 'cache->comments_count', 'cache->likes_count', 'cache->subscriptions_count',
        'cache->last_reply_user_id', 'cache->last_reply_user_name', 'popular_at',
    ];

    const CACHE_FIELDS = [
        'views_count' => 0,
        'comments_count' => 0,
        'likes_count' => 0,
        'subscriptions_count' => 0,
        'last_reply_user_id' => 0,
        'last_reply_user_name' => null,
    ];

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

    public function getCacheAttribute()
    {
        return array_merge(self::CACHE_FIELDS, json_decode($this->attributes['cache'] ?? '{}', true));
    }

}
