<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFollowerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function store(StoreFollowerRequest $request)
    {
        $user = User::findOrFail($request['user_id']);
        Auth::user()->follows()->attach($user->id);

        session()->flash('message', $user->name . 'のフォローしました。');

        return redirect()->back();
    }

    public function destroy($follower)
    {
        $user = User::findOrFail($follower);
        Auth::user()->follows()->detach($user);

        session()->flash('message', $user->name . 'のフォローを解除しました。');

        return redirect()->back();
    }

    public function list($follower, $type)
    {
        $user = User::findOrFail($follower);

        switch ($type) {
            case 'following':
                $title = 'フォロー中';
                $users = User::whereHas('followers', function ($query) use ($user) {
                    $query->where('following_id', $user->id);
                })->paginate(10);

                return view('followers.list', compact('users', 'title'));

            case 'followed':
                $title = 'フォロワー';
                $users = User::whereHas('follows', function ($query) use ($user) {
                    $query->where('followed_id', $user->id);
                })->paginate(10);

                return view('followers.list', compact('users', 'title'));
        }
    }
}
