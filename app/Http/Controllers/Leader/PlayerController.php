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
        return view('leader.players', compact('users'));
    }

    public function players_notes_index($user)
    {
        $user = User::where('id', $user)->first();
        $notes = Note::where('user_id', $user->id)->latest()->paginate(10);
        return view('leader.players_notes_index', compact('notes', 'user'));
    }

    public function players_note_detail($id)
    {
        $note = Note::findOrFail($id);
        // dd($notes);
        return view('leader.players_note_detail', compact('note'));
    }
}
