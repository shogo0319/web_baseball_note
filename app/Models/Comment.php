<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'note_id', 'comment'];

    public function user()
    {
        return $this->belongsTo((User::class));
    }

    public function note()
    {
        return $this->belongsTo(Note::class);
    }

    public function leader()
    {
        return $this->belongsTo(Leader::class);
    }

    public function getPosterAttribute()
    {
        return $this->leader_id ? $this->leader : $this->user;
    }


}
