<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Note;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Note $note)
    {
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->note_id = $note->id;
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('success', 'コメントを追加しました。');
    }
}
