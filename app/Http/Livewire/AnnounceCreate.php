<?php

namespace App\Http\Livewire;

use App\Models\Announce;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AnnounceCreate extends Component
{
    public $name;
    public $text;
    public $url;
    public $type = 1;
    public $authority = 1;

    protected $rules = [
        'name' => 'required',
        'text' => 'required',
        'url' => 'nullable|url',
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

    public function store()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'name' => $this->name,
            'text' => $this->text,
            'type' => intval($this->type),
            'authority' => intval($this->authority),
            'url' => $this->url,
            'is_visible' => 1,
        ];

        if (!is_null($this->url)) {
            $data['url'] = $this->url;
        }

        Announce::create($data);

        session()->flash('message', '周知を投稿しました。');

        return to_route('announces.index');
    }

    public function render()
    {
        return view('livewire.announce-create');
    }
}
