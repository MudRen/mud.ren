<?php

namespace App\Models;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use ModelTree;

    protected $connection = 'sqlite_lpc';

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
