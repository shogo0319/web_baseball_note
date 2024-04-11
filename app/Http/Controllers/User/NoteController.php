<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteController\StoreRequest;
use App\Http\Requests\NoteController\UpdateRequest;
use App\Models\Note;
use App\Models\PracticeRunning;
use App\Models\PracticeSwing;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $query = Note::where('user_id', auth('user')->id());

        if ($request->search_date != '') {
            $query->whereDate('created_at', '=', $request->search_date);
        }

        $notes = $query->latest()->paginate(10);
        
        return view('user.notes_index', compact('notes'));
    }

    public function create()
    {
        return view('user.note_create');
    }

    public function store(StoreRequest $request)
    {
        $userId = auth('user')->id();
        $note = new Note();
        $note->user_id = $userId;
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

        return redirect()->route('user.notes_index')->with('success', 'ノートが作成されました！');
    }

        public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('user.note_edit', compact('note'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->fill($request->all())->save();

        $userId = auth('user')->id();
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

        return redirect()->route('user.note_detail', ['id' => $id])->with('success', 'ノートが更新されました！');
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        if ($note->user_id !== auth('user')->id()) {
            return redirect()->route('user.notes_index')->with('error', 'アクセス権限がありません！');
        }
        $note->delete();

        $userId = auth('user')->id();

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
        return redirect()->route('user.notes_index')->with('success', 'ノートが削除されました！');
    }

    public function detail($id)
    {
        $note = Note::findOrFail($id);
        return view('user.note_detail', compact('note'));
    }
}
