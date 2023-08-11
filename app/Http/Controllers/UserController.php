<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        //
    }

    public function store(StoreUserRequest $request)
    {
        //
    }

    public function show(User $user)
    {
        return $user->id === Auth::id() ? to_route('users.index') : view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $updateData = [
            'name' => $request->input('name'),
            'introduction' => $request->input('introduction'),
        ];

        if ($request->hasFile('profile_image')) {
            $profImageFile = $request->file('profile_image');
            $profFilePath = ImageService::upload($profImageFile, 'user');
            $updateData['profile_image'] = $profFilePath;
        }

        if ($request->hasFile('background_image')) {
            $bgImageFile = $request->file('background_image');
            $bgFilePath = ImageService::upload($bgImageFile, 'background');
            $updateData['background_image'] = $bgFilePath;
        }

        $user->update($updateData);

        session()->flash('message', 'ユーザ情報を編集しました。');

        return redirect()->back();
    }

    public function destroy(User $user)
    {
        //
    }
}
