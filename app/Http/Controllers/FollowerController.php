<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFollowerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function store(StoreFollowerRequest $request)
    {
        Auth::user()->follows()->attach($request['user_id']);

        return redirect()->back();
    }

    public function destroy($follower)
    {
        $user = User::findOrFail($follower);
        Auth::user()->follows()->detach($user);

        return redirect()->back();
    }

    public function list($follower, $type)
    {
        $user = User::findOrFail($follower);

        switch ($type) {
            case 'following':
                $users = $user->follows;

                return view('followers.list', compact('users'));

            case 'followed':
                $users = $user->followers;

                return view('followers.list', compact('users'));
        }
    }
}
