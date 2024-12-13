<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Round;
use App\Models\QuestionTaken;

class RoundController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userProgress = QuestionTaken::where('user_id', $user->id)->first();
        $currentStage = $userProgress ? $userProgress->current_stage : 1; 

        $rounds = Round::orderBy('id', 'asc')->get();

        return view('user.level', compact('rounds', 'currentStage'));
    }
}

