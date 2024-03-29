<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function batting_averages()
    {
        return $this->hasMany(BattingAverage::class);
    }

    public function on_base_percentages()
    {
        return $this->hasMany(OnBasePercentage::class);
    }

    public function batting_points()
    {
        return $this->hasMany(BattingPoint::class);
    }

    public function practice_runnings()
    {
        return $this->hasMany(PracticeRunning::class);
    }

    public function practice_swings()
    {
        return $this->hasMany(PracticeSwing::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
