<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnounceRequest;
use App\Http\Requests\UpdateAnnounceRequest;
use App\Models\Announce;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userIds = Follower::where('following_id', Auth::id())
            ->select('followed_id')
            ->get();
        $userIds[] = Auth::id();
        $announces = Announce::whereIn('user_id', $userIds)
            ->latest()
            ->get();

        return view('announces.index', compact('announces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnnounceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnounceRequest $request)
    {
        // app/Http/Livewire/AnnounceCreate.phpへ移行済
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function show(Announce $announce)
    {
        $announce = Announce::findOrFail($announce->id);

        return view('announces.show', compact('announce'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function edit(Announce $announce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnnounceRequest  $request
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnounceRequest $request, Announce $announce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announce $announce)
    {
        $prevUrl = url()->previous();
        $prevRouteName = app('router')->getRoutes()->match(app('request')->create($prevUrl))->getName();

        $announce = Announce::findOrfail($announce->id);
        $announce->delete();

        session()->flash('message', '周知を削除しました。');

        return $prevRouteName === 'announces.show' ? to_route('announces.index') : redirect()->back();
    }
}
