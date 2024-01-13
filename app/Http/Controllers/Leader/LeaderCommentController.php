<?php

namespace App\Http\Controllers\leader;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Note;
use Illuminate\Http\Request;

class LeaderCommentController extends Controller
{
    public function store(Request $request, Note $note)
    {
        $comment = new Comment();
        $comment->leader_id = auth('leader')->id();
        $comment->note_id = $note->id;
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('success', 'コメントを作成しました。');
    }
}
