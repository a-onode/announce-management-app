<?php

namespace App\View\Components\Announces;

use Illuminate\View\Component;

class Badge extends Component
{
    public $announceType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($announceType)
    {
        $this->announceType = $announceType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.announces.badge');
    }
}
