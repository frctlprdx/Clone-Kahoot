<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTaken extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'question_taken';
    public function user(){
        return $this->belongsTo(User::class);
    }
}
