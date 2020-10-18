<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Users extends Component
{
    public $message = "炎黄群侠传玩家列表";

    public function render()
    {
        return view('livewire.users', [
            'users' => cache('users'),
        ]);
    }
}
