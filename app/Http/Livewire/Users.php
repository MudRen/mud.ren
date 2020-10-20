<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;

class Users extends Component
{
    public $message = "炎黄玩家列表";
    public $users;

    public function mount()
    {
        $this->users = Arr::pluck(array_values(cache('users')), 'dbase');
    }

    public function render()
    {
        return view('livewire.users');
    }
}
