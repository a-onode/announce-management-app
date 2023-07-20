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
        $data = [
            'user_id' => Auth::id(),
            'name' => $request['name'],
            'text' => $request['text'],
            'type' => $request['type'],
            'authority' => intval($request['type']),
            'url' => $request['url'],
            'is_visible' => 1,
        ];

        if (!is_null($request['url'])) {
            $data['url'] = $request['url'];
        }

        Announce::create($data);

        session()->flash('message', '周知を投稿しました。');

        return to_route('announces.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announce  $announce
     * @return \Illuminate\Http\Response
     */
    public function show($announce)
    {
        $announce = Announce::findOrFail($announce);

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
        //
    }
}
