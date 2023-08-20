<?php

namespace App\Http\Livewire\Announce;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $text;
    public $url;
    public $firstFile;
    public $secondFile;
    public $type = 1;
    public $authority = 1;

    protected $rules = [
        'name' => 'required',
        'text' => 'required',
        'url' => 'nullable|url',
        'firstFile' => 'nullable',
        'secondFile' => 'nullable',
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

    public function render()
    {
        return view('livewire.announce.create');
    }
}
