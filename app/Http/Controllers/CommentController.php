<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

    public function destroy(Note $note, Comment $comment)
    {
        // コメントを削除する前に、ユーザーがそのコメントの所有者であることを確認する
        if (Auth::id() == $comment->user_id) {
            $comment->delete();
            return back()->with('success', 'コメントを削除しました。');
        }

        return back()->with('error', 'コメントの削除に失敗しました。');
    }
}
