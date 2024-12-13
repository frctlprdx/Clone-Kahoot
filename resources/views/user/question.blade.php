@extends('user.layout')
@section('content')
<style>
    body{
        display: unset;
    }
</style>
<div class="question">
    <div class="header-option">
        <a class="back-btn"
            ><img class="back-icon" src="{{ asset('assets/img/Left-Arrow.svg') }}" /> <span class="text-white">Level 1</span></a
        >
    </div>
    <div class="container-fluid2 rounded-top-5 custom-shadow">
        <div class="time-progress">
            <span>Waktu tersisa: 10:89</span>
            <div
                class="progress rounded-3"
                style="height: 30px; background-color: #004aad"
            >
                <div
                    class="progress-bar rounded-3"
                    role="progressbar"
                    style="width: 50%; background-color: #a5c8e6"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                ></div>
            </div>
        </div>
    
        <div class="question-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias fuga,
            mollitia laborum unde animi repellat nam officia tenetur ipsa id, totam
            quisquam, aliquam autem? Recusandae at qui error voluptatem hic.
        </div>
    
        <div class="form-answer rounded-3">
            <div class="option-answer">
                <label class="checkbox-answer" for="jawaban_A">
                    <input name="answer" id="jawaban_A" hidden type="radio" />
                    <div class="answer rounded-2">Jawaban A</div>
                </label>
                <label class="checkbox-answer" for="jawaban_B">
                    <input name="answer" id="jawaban_B" hidden type="radio" />
                    <div class="answer rounded-2">Jawaban B</div>
                </label>
                <label class="checkbox-answer" for="jawaban_C">
                    <input name="answer" id="jawaban_C" hidden type="radio" />
                    <div class="answer rounded-2">Jawaban C</div>
                </label>
                <label class="checkbox-answer" for="jawaban_D">
                    <input name="answer" id="jawaban_D" hidden type="radio" />
                    <div class="answer rounded-2">Jawaban D</div>
                </label>
            </div>

            <!-- Tombol Navigasi -->
            <div class="d-flex justify-content-between mt-4">
                @if ($currentIndex > 0)
                    <a href="{{ route('user.question', ['id' => $round->id, 'index' => $currentIndex - 1]) }}"
                        class="btn btn-primary">Back</a>
                @endif
                @if ($currentIndex < $totalQuestions - 1)
                    <a href="{{ route('user.question', ['id' => $round->id, 'index' => $currentIndex + 1]) }}"
                        class="btn btn-primary">Next</a>
                @else
                    <form action="{{ route('user.submit', ['round_id' => $round->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Ambil waktu dari localStorage atau set ke durasi awal
        let timeLeft = localStorage.getItem('timeLeft') ? parseInt(localStorage.getItem('timeLeft')) :
            {{ $round->duration }};
        let totalDuration = {{ $round->duration }}; // Menyimpan total durasi awal untuk perhitungan persentase

        // Fungsi untuk mengupdate tampilan countdown
        function updateCountdown() {
            let hours = Math.floor(timeLeft / 3600); // jam
            let minutes = Math.floor((timeLeft % 3600) / 60); // menit
            let seconds = timeLeft % 60; // detik

            // Formatkan menjadi dua digit
            hours = String(hours).padStart(2, '0');
            minutes = String(minutes).padStart(2, '0');
            seconds = String(seconds).padStart(2, '0');

            // Update elemen HTML untuk countdown
            document.getElementById('countdown').textContent = `${hours}:${minutes}:${seconds}`;

            // Hitung persentase waktu yang tersisa
            let percentageLeft = (timeLeft / totalDuration) * 100;

            // Update lebar progress bar sesuai persentase waktu yang tersisa
            document.getElementById('progress-bar').style.width = `${percentageLeft}%`;

            // Kurangi waktu setiap detik
            if (timeLeft > 0) {
                timeLeft--;
                localStorage.setItem('timeLeft', timeLeft); // Simpan waktu tersisa ke localStorage
            } else {
                clearInterval(countdownInterval); // Jika waktu habis, hentikan countdown
                alert("Waktu habis!");
                // Anda bisa mengarahkan ke halaman lain atau menunjukkan pesan selesai
            }
        }

        // Mulai countdown setiap detik
        let countdownInterval = setInterval(updateCountdown, 1000);
    </script>
@endsection
