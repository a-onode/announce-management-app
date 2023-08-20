<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnounceRequest;
use App\Http\Requests\UpdateAnnounceRequest;
use App\Models\Announce;
use App\Models\Follower;
use App\Services\ImageService;
use App\Services\SlackNotificationServiceInterface;
use Illuminate\Support\Facades\Auth;

class AnnounceController extends Controller
{
    private $slack_notification_service_interface;

    public function __construct(SlackNotificationServiceInterface $slack_notification_service_interface)
    {
        $this->slack_notification_service_interface = $slack_notification_service_interface;
    }

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
            ->paginate(10);

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
            'name' => $request->input('name'),
            'text' => $request->input('text'),
            'type' => intval($request->input('type')),
            'authority' => intval($request->input('authority')),
            'url' => $request->input('url'),
            'is_visible' => intval($request->input('isVisible')),
        ];

        if (!is_null($request->file('file1'))) {
            $fileNameToStore = ImageService::upload($request->file('file1'), 'announce');
            $data['file1'] = $fileNameToStore;
        }

        if (!is_null($request->file('file2'))) {
            $fileNameToStore = ImageService::upload($request->file('file2'), 'announce');
            $data['file2'] = $fileNameToStore;
        }

        if (!is_null($request->input('url'))) {
            $data['url'] = $request->input('url');
        }

        $announce = Announce::create($data);

        if ($request->input('isSlack') === '1') {
            $lines = explode("\n", $announce->text);
            $quotedLine = array_map(function ($line) {
                return ">" . $line;
            }, $lines);
            $quotedText = implode("\n", $quotedLine);
            $msg = ':mega: 【周知投稿のお知らせ】 :mega:' . "\n" . "\n" .
                '新規周知が投稿されました。' . "\n" .
                '各自一読し、業務遂行願います。' . "\n" . "\n" . "\n" .
                '*' . $announce->name . '*' . "\n" .
                $quotedText . "\n" . "\n" .
                '-----------------------------------' . "\n" .
                '投稿者：' . Auth::user()->name . "\n" .
                'リンク先：' . url()->full() . '/' . $announce->id . "\n" .
                '-----------------------------------' . "\n" . "\n" .
                '<!here>';

            $this->slack_notification_service_interface->send($msg);
        }

        session()->flash('message', '周知を投稿しました。');

        return to_route('announces.index');
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
