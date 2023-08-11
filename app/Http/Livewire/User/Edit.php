<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Edit extends Component
{
    public $user;
    public $name;
    public $introduction;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required',
        'introduction' => 'max:250',
        'password' => 'min:8|confirmed',
    ];

    protected $messages = [
        'name.required' => '必須項目です。',
        'introduction.max' => '250文字以内で入力してください。',
        'password.min' => '8文字以上で入力してください。',
        'password.confirmed' => '確認用パスワードと一致しません。',
    ];


    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->introduction = $user->introduction;
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function update()
    {
        $this->validate();

        $this->emit('validateSuccess');
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
