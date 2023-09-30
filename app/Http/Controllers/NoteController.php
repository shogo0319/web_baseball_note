<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;


class NoteController extends Controller
{
    public function create()
    {
        return view('note_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'practice' => 'nullable',
            'swing' => 'required|integer',
            'running' => 'required|numeric',
            'weight' => 'required|numeric',
            'condition' => 'required',
            'place' => 'nullable',
            'opponent' => 'nullable',
            'score' => 'nullable',
            'memo' => 'required',
        ],
        [
            'title.required' => 'タイトルは必須です',
            'swing.required' => '素振り回数は必須です',
            'swing.integer' => '数字を入力してください',
            'running.required' => '走った距離は必須です',
            'running.numeric' => '数字を入力してください',
            'weight.required' => '体重は必須です',
            'weight.numeric' => '数字を入力してください',
            'condition.required' => '体重は必須です',
            'memo.required' => '今日の振り返りは必須です',
        ]);
        
        $note = new Note();
        $note->user_id = auth()->id();
        $note->fill($request->all())->save();

        return redirect()->route('home')->with('success', 'ノートが作成されました！');
    }

}
