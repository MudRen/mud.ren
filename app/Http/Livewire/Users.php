<?php

namespace App\Http\Livewire;

use App\Mud;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search' => ['except' => '']];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = Mud::where('id', 'like', $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->orWhere('title', 'like', '%' . $this->search . '%')
            ->orderBy('combat_exp', 'desc')
            ->paginate(100);

        return view('livewire.users', [
            'users' => $users
        ]);
    }

    public function getAccurateRank($index, $users)
    {
        return ($users->currentPage() - 1) * $users->perPage() + $index;
    }
}