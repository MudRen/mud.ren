<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;

class Users extends Component
{
    public $message = "炎黄群侠传玩家列表";
    // public $users;

    public function render()
    {
        return view('livewire.users', [
            'users' => Arr::pluck(array_values(cache('users')), 'dbase'),
        ]);
    }
}
