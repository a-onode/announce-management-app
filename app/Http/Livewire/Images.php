<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Images extends Component
{
    public $announce;
    public $isVisibleImageModal1 = false;
    public $isVisibleImageModal2 = false;

    public function mount($announce)
    {
        $this->announce = $announce;
    }

    public function openImageModal1()
    {
        $this->isVisibleImageModal1 = true;
    }

    public function openImageModal2()
    {
        $this->isVisibleImageModal2 = true;
    }

    public function closeImageModal1()
    {
        $this->isVisibleImageModal1 = false;
    }

    public function closeImageModal2()
    {
        $this->isVisibleImageModal2 = false;
    }

    public function render()
    {
        return view('livewire.images');
    }
}
