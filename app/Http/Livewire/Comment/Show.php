<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

class Show extends Component
{
    public $comment;

    public function mount($comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.comment.show');
    }
}
