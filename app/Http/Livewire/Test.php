<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Test extends Component
{
    public $users = [];
    public function render()
    {
        $this->users=User::all();
        // dd($this->users);
        return view('livewire.test');
    }
    public function index()
    {
        return view('test');
    }
}
