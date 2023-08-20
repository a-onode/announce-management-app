<?php

namespace App\Http\Livewire\Announce;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $name;
    public $text;
    public $url;
    public $file1;
    public $file2;
    public $type = 1;
    public $authority = 1;
    public $isVisible = false;
    public $isSlack = false;

    protected $rules = [
        'name' => 'required',
        'text' => 'required',
        'url' => 'nullable|url',
        'file1' => 'nullable',
        'file2' => 'nullable',
    ];

    protected $messages = [
        'name.required' => '必須項目です',
        'text.required' => '必須項目です',
        'url.url' => 'URLを指定してください',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function toggleslack()
    {
        $this->isSlack = !$this->isSlack;
    }

    public function store()
    {
        $this->validate();

        session()->flash('isSlack', $this->isSlack);

        $this->emit('validateSuccess');
    }

    public function render()
    {
        return view('livewire.announce.create');
    }
}
