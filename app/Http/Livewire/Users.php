<?php

namespace App\Http\Livewire;

use App\Mud;
use Livewire\Component;
use Illuminate\Support\Arr;

class Users extends Component
{
    public $message = "炎黄英雄榜";
    public $users;

    public function mount()
    {
        // $this->users = Arr::pluck(array_values(cache('users')), 'dbase');
        $this->users = Mud::orderBy('combat_exp', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.users');
    }
}
