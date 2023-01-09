<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{
    public $count = 50;

    public function render()
    {     
        return view('livewire.show-posts');
    }


    public function index()
    {
        //dd($this->count);
        return view('show-posts');
    }


    public function increment()
    {
        $this->count++;
    }
    public function decrement()
    {
        $this->count--;
    }
}
