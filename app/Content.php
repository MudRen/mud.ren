<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $connection = 'mybbs';

    /**
     * 获取拥有此内容的模型
     */
    public function contentable()
    {
        return $this->morphTo();
    }
}
