<?php

namespace App\View\Components\Comments;

use Illuminate\View\Component;

class Counter extends Component
{
    public $announce;
    public function __construct($announce)
    {
        $this->announce = $announce;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comments.counter');
    }
}
