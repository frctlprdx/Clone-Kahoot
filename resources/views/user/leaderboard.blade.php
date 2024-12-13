@extends('user/layout')

@section('content')
    <style>
        body {
            margin: 0;
            display: block;
            background-color: #00c2e7;
        }
    </style>

    <main class="container-leaderboard">
        <section class="winner-section">
            <div class="winner-board">
                <div class="title-section">
                    <div class="icon-wrapper">
                        <i class="fas fa-award"></i>
                    </div>
                    <h1>Leaderboard</h1>
                </div>

                <div id="winner-list">
                    <div class="winner">
                        <div class="ordinal">
                            1
                        </div>
                        <div class="icon" style="background-color: #fff;">
                            <i class="fa fa-user" style="font-size: 1.2rem; color: #333;"></i>
                        </div>
                        <div class="winner-name">
                            <h4>Jensen Huang</h4>
                            <span>Sub title</span>
                        </div>
                        <div class="winner-info">
                            <span>
                                1945
                            </span>
                        </div>
                    </div>
                    <div class="winner">
                        <div class="ordinal">
                            2
                        </div>
                        <div class="icon" style="background-color: #fff;">
                            <i class="fa fa-user" style="font-size: 1.2rem; color: #333;"></i>
                        </div>
                        <div class="winner-name">
                            <h4>Jensen Huang</h4>
                            <span>Sub title</span>
                        </div>
                        <div class="winner-info">
                            <span>
                                2024
                            </span>
                        </div>
                    </div>
                    <div class="winner">
                        <div class="ordinal">
                            3
                        </div>
                        <div class="icon" style="background-color: #fff;">
                            <i class="fa fa-user" style="font-size: 1.2rem; color: #333;"></i>
                        </div>
                        <div class="winner-name">
                            <h4>Jensen Huang</h4>
                            <span>Sub title</span>
                        </div>
                        <div class="winner-info">
                            <span>
                                1947
                            </span>
                        </div>
                    </div>
                    <div class="winner">
                        <div class="ordinal">
                            4
                        </div>
                        <div class="icon" style="background-color: #fff;">
                            <i class="fa fa-user" style="font-size: 1.2rem; color: #333;"></i>
                        </div>
                        <div class="winner-name">
                            <h4>Jensen Huang</h4>
                            <span>Sub title</span>
                        </div>
                        <div class="winner-info">
                            <span>
                                3333
                            </span>
                        </div>
                    </div>
                    <div class="winner">
                        <div class="ordinal">
                            4
                        </div>
                        <div class="icon" style="background-color: #fff;">
                            <i class="fa fa-user" style="font-size: 1.2rem; color: #333;"></i>
                        </div>
                        <div class="winner-name">
                            <h4>Jensen Huang</h4>
                            <span>Sub title</span>
                        </div>
                        <div class="winner-info">
                            <span>
                                3333
                            </span>
                        </div>
                    </div>
                    
                </div>
        </section>
    </main>

    <script>
        const winner1 = document.querySelector('.winner:nth-child(1)');
        const winner2 = document.querySelector('.winner:nth-child(2)');
        const winner3 = document.querySelector('.winner:nth-child(3)');
        winner1.addEventListener('click', () => {
            confetti({
                particleCount: 300, // Jumlah partikel
                spread: 150, // Sebarannya
                origin: {
                    x: 0.5,
                    y: 0.3
                } // Titik tengah
            });
        })
        winner2.addEventListener('click', () => {
            confetti({
                particleCount: 200, // Jumlah partikel
                spread: 150, // Sebarannya
                origin: {
                    x: 0.5,
                    y: 0.4
                } // Titik tengah
            });
        })
        winner3.addEventListener('click', () => {
            confetti({
                particleCount: 100, // Jumlah partikel
                spread: 150, // Sebarannya
                origin: {
                    x: 0.5,
                    y: 0.5
                } // Titik tengah
            });
        })
    </script>
@endsection
