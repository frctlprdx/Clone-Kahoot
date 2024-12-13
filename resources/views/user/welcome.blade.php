@extends('user/layout')

@section('content')
<div class="container-fluid bg-white rounded-top-5 custom-shadow">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <!-- Menampilkan logo -->
            <div class="logos d-flex justify-content-center mt-5">
                <img src=" {{ asset('assets/img/logoUdinus.png') }}" alt="Logo 1" class="mx-2">
                <img src="{{ asset('assets/img/LogoUnggul.png') }}" alt="Logo 2" class="mx-2">
                <img src="{{ asset('assets/img/rankasia.png ') }}" alt="Logo 3" class="mx-2">
            </div>
            <!-- Logo besar di tengah -->
            <div class="d-flex justify-content-center align-items-center mt-0">
            <img src="{{ asset('assets/img/logofikfair5.png') }}" alt="Logo Fikfair" class="img-fluid" width="400">
            </div>
    
            <!-- Button Start -->
            <div class="mb-4">
                <a href="{{ route('user.register') }}"><button href="" class="btn btn-welcome btn-lg px-4 py-2">START</button></a>
            </div>
        </div>
    </div>
</div>

@endsection