<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_time', 'duration'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function leaderboard()
    {
        return $this->hasMany(Leaderboard::class);
    }
}