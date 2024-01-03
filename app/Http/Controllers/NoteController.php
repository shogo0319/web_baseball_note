<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\PracticeRunning;
use App\Models\PracticeSwing;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', auth()->id())->latest()->paginate(10);
        return view('notes_index', compact('notes'));
    }

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
            'youtube_link' => 'nullable|url',
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
            'youtube_link.url' => '有効なURLを入力してください',
        ]);

        $userId = auth()->id();
        $note = new Note();
        $note->user_id = auth()->id();
        $note->fill($request->all())->save();

        $totalRunningDistance = Note::where('user_id', $userId)->sum('running');

        PracticeRunning::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['distant' => $totalRunningDistance] // 更新または作成する値
        );

        $totalSwing = Note::where('user_id', $userId)->sum('swing');

        PracticeSwing::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['swing' => $totalSwing] // 更新または作成する値
        );

        return redirect()->route('notes_index')->with('success', 'ノートが作成されました！');
    }

        public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('note_edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->fill($request->all())->save();

        $userId = auth()->id();
        $totalRunningDistance = Note::where('user_id', $userId)->sum('running');
        // dd($totalRunningDistance);
        PracticeRunning::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['distant' => $totalRunningDistance] // 更新または作成する値
        );

        $totalSwing = Note::where('user_id', $userId)->sum('swing');
        // dd($totalSwing);
        PracticeSwing::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['swing' => $totalSwing] // 更新または作成する値
        );

        return redirect()->route('notes_index')->with('success', 'ノートが更新されました！');
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        if ($note->user_id !== auth()->id()) {
            return redirect()->route('notes_index')->with('error', 'アクセス権限がありません！');
        }
        $note->delete();

        $userId = auth()->id();

        $totalRunningDistance = Note::where('user_id', $userId)->sum('running');
        PracticeRunning::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['distant' => $totalRunningDistance] // 更新または作成する値
        );

        $totalSwing = Note::where('user_id', $userId)->sum('swing');
        PracticeSwing::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['swing' => $totalSwing] // 更新または作成する値
        );
        return redirect()->route('notes_index')->with('success', 'ノートが削除されました！');
    }

    public function detail($id)
    {
        $note = Note::findOrFail($id);
        return view('note_detail', compact('note'));
    }
}
