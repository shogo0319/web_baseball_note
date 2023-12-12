<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';
    protected $dates = ['game_at'];


    protected $fillable = [
        'game_at', 'place', 'opponent', 'score'
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
