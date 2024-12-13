<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Round;

class QuestionController extends Controller
{
    public function showQuestion($roundId, $questionIndex = 0)
    {
        // Ambil round berdasarkan ID
        $round = Round::with('questions')->findOrFail($roundId);

        // Validasi indeks pertanyaan
        $totalQuestions = $round->questions->count();
        if ($questionIndex < 0 || $questionIndex >= $totalQuestions) {
            return redirect()->route('user.round', $roundId)->withErrors('Invalid question index.');
        }

        // Ambil pertanyaan berdasarkan indeks
        $question = $round->questions[$questionIndex];

        // Dapatkan durasi round (asumsikan durasi dalam detik)
        $duration = $round->duration;

        // Pass duration ke view bersama data lainnya
        return view('user.question', [
            'round' => $round,
            'question' => $question,
            'currentIndex' => $questionIndex,
            'totalQuestions' => $totalQuestions,
            'duration' => $duration, // Menambahkan durasi ke view
        ]);
    }
}