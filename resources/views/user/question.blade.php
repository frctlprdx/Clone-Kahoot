@extends('user.layout')
@section('content')
    <div class="question" style="margin-top: 5rem;">
        <div class="header-option">
            <a class="back-btn">
                <img class="back-icon" src="{{ asset('assets/img/Left-Arrow.svg') }}" />
                <span class="text-white">{{ $round->name }}</span>
            </a>
        </div>
        <div class="container-fluid2 rounded-top-5 custom-shadow">
            <div class="time-progress">
                <span>Waktu tersisa: <span id="countdown"></span></span> <!-- Countdown element -->
                <div class="progress rounded-3" style="height: 30px; background-color: #004aad">
                    <div id="progress-bar" class="progress-bar rounded-3" role="progressbar"
                        style="width: 100%; background-color: #a5c8e6" aria-valuenow="100" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>

            <!-- Menampilkan Pertanyaan -->
            <div class="question-text">
                <p><strong>Pertanyaan {{ $currentIndex + 1 }}:</strong> {{ $question->content }}</p>
                @if ($question->image)
                    <img src="{{ asset('storage/' . $question->image) }}" alt="Question Image" class="img-fluid" />
                @endif
            </div>

            <!-- Menampilkan Opsi Jawaban -->
            <div class="form-answer rounded-3">
                <div class="option-answer">
                    @foreach (json_decode($question->options, true) as $optionKey => $option)
                        <label class="checkbox-answer" for="jawaban_{{ $currentIndex }}_{{ $optionKey }}">
                            <input name="answer_{{ $currentIndex }}" id="jawaban_{{ $currentIndex }}_{{ $optionKey }}"
                                hidden type="radio" />
                            <div class="answer rounded-2">{{ $option }}</div>
                        </label>
                    @endforeach
                </div>
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
                    <button class="btn btn-success">Submit</button>
                @endif
            </div>
        </div>
    </div>

    <!-- Countdown JavaScript -->
    <script>
        // Ambil waktu dari parameter yang diberikan atau localStorage
        let timeLeft = localStorage.getItem('timeLeft') || {{ $round->duration }}; // durasi dalam detik
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
            }
        }

        // Mulai countdown setiap detik
        let countdownInterval = setInterval(updateCountdown, 1000);
    </script>
@endsection
