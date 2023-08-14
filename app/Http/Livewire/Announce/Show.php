<?php

namespace App\Http\Livewire\Announce;

use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $announce;

    public function mount($announce)
    {
        $this->announce = $announce;
    }

    public function render()
    {
        return view('livewire.announce.show');
    }
}
