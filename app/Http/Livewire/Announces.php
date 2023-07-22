<?php

namespace App\Http\Livewire;

use App\Models\Announce;
use Livewire\Component;
use Livewire\WithPagination;

class Announces extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.announces', [
            'announces' => Announce::latest()->paginate(10),
        ]);
    }
}
