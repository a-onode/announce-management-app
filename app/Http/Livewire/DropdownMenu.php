<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownMenu extends Component
{
    public $announce;
    public $isVisibleDropdownMenu = false;
    public $isVisibleDeleteModal = false;

    public function mount($announce)
    {
        $this->announce = $announce;
    }

    public function closeDropdownMenu()
    {
        $this->isVisibleDropdownMenu = false;
    }

    public function openDeleteModal()
    {
        $this->isVisibleDropdownMenu = false;
        $this->isVisibleDeleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->isVisibleDeleteModal = false;
    }

    public function render()
    {
        return view('livewire.dropdown-menu');
    }
}
