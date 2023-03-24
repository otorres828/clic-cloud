<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Panel extends Component
{
    public $estatus=1;
    public function render()
    {
        return view('livewire.panel');
    }
}
