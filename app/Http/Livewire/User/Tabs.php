<?php

namespace App\Http\Livewire\User;

use App\Models\Announce;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Tabs extends Component
{
    use WithPagination;

    public $user;
    public $currentTab = '周知';

    public function mount($user)
    {
        $this->user = $user;
    }

    public function setCurrentTab($tab)
    {
        $this->currentTab = $tab;
    }

    public function render()
    {
        return view('livewire.user.tabs');
    }
}
