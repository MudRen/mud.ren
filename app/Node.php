<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;

class Node extends Model
{
    use HasFactory;
    use ModelTree;

    protected $connection = 'mybbs';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('node_id');
        $this->setOrderColumn('order');
        // $this->setTitleColumn('title');
    }
}
