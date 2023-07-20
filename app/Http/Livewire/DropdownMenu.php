<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownMenu extends Component
{
    public $announce;
    public $isVisible = false;

    public function mount($announce)
    {
        $this->announce = $announce;
    }

    public function hidden()
    {
        $this->isVisible = false;
    }

    public function render()
    {
        return view('livewire.dropdown-menu');
    }
}
