<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Announce;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreCommentRequest $request)
    {
        $announce = Announce::findOrFail($request['announce_id']);

        Comment::create([
            'user_id' => Auth::id(),
            'announce_id' => $announce->id,
            'text' => $request['comment'],
        ]);

        return to_route('announces.show', compact('announce'));
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $announce = Announce::findOrFail($request['announce_id']);
        $comment = Comment::findOrFail($comment->id);

        $comment->text = $request['text'];
        $comment->save();

        session()->flash('message', 'コメントを編集しました。');

        return to_route('announces.show', compact('announce'));
    }

    public function destroy(Comment $comment, Request $request)
    {
        $announce = Announce::findOrFail($request['announce_id']);
        $comment = Comment::findOrfail($comment->id);
        $comment->delete();

        session()->flash('message', 'コメントを削除しました。');

        return to_route('announces.show', compact('announce'));
    }
}
