<?php

namespace App\View\Components\Comments;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $announce;

    public function __construct($announce)
    {
        $this->announce = $announce;
    }

    public function render()
    {
        return view('components.comments.textarea');
    }
}
