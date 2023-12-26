<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeRunning extends Model
{
    use HasFactory;

    protected $casts = [
        'distant' => 'decimal:3',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'distant'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
