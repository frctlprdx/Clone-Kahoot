<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'image', 'option_a', 'option_b','option_c', 'option_d', 'correct_option', 'round_id', 'timer'

    ];

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}