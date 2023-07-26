<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Announces extends Component
{
    use WithPagination;

    public $announce;

    public function mount($announce)
    {
        $this->announce = $announce;
    }

    public function render()
    {
        return view('livewire.announces');
    }
}
