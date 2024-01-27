<?php

namespace App\Http\Controllers\leader;

use Illuminate\Support\Facades\Auth;
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

    public function destroy(Note $note, Comment $comment)
    {
        if (Auth::id() == $comment->leader_id) {
            $comment->delete();
            return back()->with('success', 'コメントを削除しました。');
        }

        return back()->with('error', 'コメントの削除に失敗しました。');
    }
}
