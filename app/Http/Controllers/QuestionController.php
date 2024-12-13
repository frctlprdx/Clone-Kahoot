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

   
    public function submit(Request $request, $round_id)
    {
        $user_id = Auth::user()->id;

        // Update status ronde yang sudah dikerjakan
        $questionTaken = QuestionTaken::where('user_id', $user_id)
                                    ->where('round_id', $round_id)
                                    ->first();
        if ($questionTaken) {
            $questionTaken->current_stage = 2; // Tandai sebagai sudah selesai
            $questionTaken->save();
        }

        // Update ronde yang sudah dikerjakan
        $round = Round::find($round_id);
        if ($round) {
            $round->status = 'completed'; // Atur status ronde sebagai selesai
            $round->save();
        }

        // Cek ronde selanjutnya dan buka ronde tersebut, kecuali ronde pertama
        $nextRound = Round::where('id', '>', $round_id)->orderBy('id', 'asc')->first();
        if ($nextRound) {
            $nextRound->status = 'unlocked'; // Ubah status ronde berikutnya menjadi unlocked
            $nextRound->save();
        }

        // Jangan kunci ronde pertama (pastikan selalu unlocked)
        $firstRound = Round::find(1); // Ronde pertama, ID 1
        if ($firstRound) {
            $firstRound->status = 'unlocked'; // Pastikan selalu unlocked
            $firstRound->save();
        }

        // Redirect ke leaderboard
        return redirect()->route('user.leaderboard');
    }

}