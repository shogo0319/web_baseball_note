<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function leader_players()
    {
        $users = User::get();
        // dd($users);
        return view('leader.leader_players', compact('users'));
    }

    public function players_notes_index($user)
    {
        $notes = Note::where('user_id', $user)->latest()->paginate(10);
        $user = User::where('id', $user)->first();
        return view('leader.players_notes_index', compact('notes', 'user'));
    }

    public function players_note_detail($id)
    {
        $note = Note::findOrFail($id);
        // dd($notes);
        return view('leader.players_note_detail', compact('note'));
    }
}
