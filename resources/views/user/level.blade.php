@extends('user/layout')

@section('content')
<div class="container-fluid bg-white rounded-top-5 custom-shadow">
    <div class="row justify-content-center">
        <div class="col-12 text-center pilih-babak">
            <h3 class="mt-5 mb-5">Pilih Babak</h3>
        </div>

        <div class="col-12 text-center mb-4 d-flex flex-column justify-content-center align-items-center">
            @foreach($rounds as $round)
                @if($round->id <= $currentStage) 
                    {{-- Jika babak sudah bisa diakses --}}
                    <a href="{{ route('user.question', ['id' => $round->id]) }}" class="btn btn-start2 mb-4 rounded-custom w-100 text-start shadow-lg d-flex align-items-center">
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
