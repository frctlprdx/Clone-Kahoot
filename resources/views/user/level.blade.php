@extends('user.layout')

@section('content')
    <!-- Logo Fikfair -->
    <div class="logo-container">
        <img src="{{ asset('assets/img/logofikfair5.png') }}" alt="Logo Fikfair" class="img-fluid" />
    </div>

    <!-- Main Content -->
    <div class="container-fluid bg-white rounded-top-5 custom-shadow">
        <div class="row justify-content-center">
            <div class="col-12 text-center pilih-babak">
                <!-- Menampilkan "Hi <user.name>" -->
                @auth
                    <h3 class="mt-1 mb-5">Hi, {{ Auth::user()->name }}! Pilih Babak</h3>
                @else
                    <h3 class="mt-1 mb-5">Pilih Babak</h3>
                @endauth
            </div>

            <div class="col-12 text-center mb-4 d-flex flex-column justify-content-center align-items-center">
                @foreach ($rounds as $round)
                    @if ($round->id <= $currentStage)
                        {{-- Jika babak sudah bisa diakses --}}
                        <a href="{{ route('user.question', ['id' => $round->id]) }}"
                            class="btn btn-start2 mb-4 rounded-custom w-100 text-start shadow-lg d-flex align-items-center">
                            {{ $round->name }}
                        </a>
                    @else
                        {{-- Jika babak terkunci --}}
                        <button class="btn btn-start2 mb-4 rounded-custom w-100 text-start shadow-lg" disabled>
                            {{ $round->name }}
                            <img class="float-end" src="{{ asset('assets/img/Group.png') }}" alt="Locked" />
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
