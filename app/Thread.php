<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $connection = 'mybbs';

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function node()
    {
        return $this->belongsTo(Node::class, 'node_id');
    }

}
