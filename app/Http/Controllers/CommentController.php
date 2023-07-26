<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Announce;
use App\Models\Comment;
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
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
