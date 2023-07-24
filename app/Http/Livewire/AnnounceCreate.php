<?php

namespace App\Http\Livewire;

use App\Models\Announce;
use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AnnounceCreate extends Component
{
    use WithFileUploads;

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
            'is_visible' => intval($this->isVisible),
        ];

        if (!is_null($this->file1)) {
            $fileNameToStore = ImageService::upload($this->file1);

            $data['file1'] = $fileNameToStore;
        }

        if (!is_null($this->file2)) {
            $fileNameToStore = ImageService::upload($this->file2);

            $data['file2'] = $fileNameToStore;
        }

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
