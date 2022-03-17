<?php

namespace App\Http\Livewire;

use App\Thread;
use Livewire\Component;
use Livewire\WithPagination;

class Threads extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search' => ['except' => '']];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.threads', [
            'threads' => Thread::where('title', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->with(['author', 'node'])->paginate(20),
        ]);
    }
}
