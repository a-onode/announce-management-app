<?php

namespace App\Http\Livewire;

use App\Models\Announce;
use Livewire\Component;
use Livewire\WithPagination;

class Paginate extends Component
{
    use WithPagination;

    public function render()
    {
        return view(
            'livewire.paginate',
            [
                'announces' => Announce::paginate(10),
            ]
        );
    }
}
