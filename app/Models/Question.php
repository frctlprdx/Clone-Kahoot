<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'image', 'option', 'correct_option', 'round_id', 'timer'

    ];

    protected $casts = [
        'options' => 'array', // Field 'options' akan otomatis di-cast menjadi array
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