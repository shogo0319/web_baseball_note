<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Note;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Note $note)
    {
        $comment = new Comment();
        $comment->user_id = auth('user')->id();
        $comment->note_id = $note->id;
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('success', 'コメントを追加しました。');
    }

    public function destroy(Note $note, Comment $comment)
    {
        if (auth('user')->id() == $comment->user_id) {
            $comment->delete();
            return back()->with('success', 'コメントを削除しました。');
        }

        return back()->with('error', 'コメントの削除に失敗しました。');
    }
}
