<?php

namespace App\Http\Livewire;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DropdownMenu extends Component
{
    public $announce;
    public $isVisibleDropdownMenu = false;
    public $isVisibleDeleteModal = false;
    public $isFavorited;

    public function mount($announce)
    {
        $this->announce = $announce;
        $this->isFavorited = Auth::user()->isFavorite($announce->id);
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

    public function favorite()
    {
        Favorite::create([
            'user_id' => Auth::id(),
            'announce_id' => $this->announce->id,
        ]);
    }

    public function unfavorite()
    {
        Favorite::where('announce_id', $this->announce->id)
            ->where('user_id', Auth::id())
            ->delete();
    }

    public function toggleFavorite()
    {
        if ($this->isFavorited) {
            Favorite::where('announce_id', $this->announce->id)
                ->where('user_id', Auth::id())
                ->delete();
        } else {
            Favorite::create([
                'user_id' => Auth::id(),
                'announce_id' => $this->announce->id,
            ]);
        }

        $this->isFavorited = !$this->isFavorited;
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
