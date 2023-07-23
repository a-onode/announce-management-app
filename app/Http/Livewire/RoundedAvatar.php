<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RoundedAvatar extends Component
{
    public $announce;

    public function mount($announce)
    {
        $this->announce = $announce;
    }
    public function render()
    {
        return view('livewire.rounded-avatar');
    }
}
