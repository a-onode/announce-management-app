<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

class Textarea extends Component
{
    public $announce;

    public function mount($announce)
    {
        $this->announce = $announce;
    }

    public function render()
    {
        return view('livewire.comment.textarea');
    }
}
