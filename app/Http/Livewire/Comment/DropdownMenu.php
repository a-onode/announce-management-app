<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

class DropdownMenu extends Component
{
    public $comment;
    public $commentMenu = false;
    public $commentDeleteModal = false;

    public function mount($comment)
    {
        $this->comment = $comment;
    }

    public function closeCommentMenu()
    {
        $this->commentMenu = false;
    }

    public function openCommentDeleteModal()
    {
        $this->commentDeleteModal = true;
        $this->commentMenu = false;
    }

    public function closeCommentDeleteModal()
    {
        $this->commentDeleteModal = false;
    }

    public function render()
    {
        return view('livewire.comment.dropdown-menu');
    }
}
