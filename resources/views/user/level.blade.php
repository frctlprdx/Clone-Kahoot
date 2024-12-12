@extends ('user/layout')
@section('content')
<div class="container-fluid bg-white rounded-top-5 custom-shadow">
    <div class="row justify-content-center">
        <div class="col-12 text-center pilih-babak">
            <h3 class="mt-5 mb-5">Pilih Babak</h3>
        </div>

        <div
            class="col-12 text-center mb-4 d-flex flex-column justify-content-center align-items-center"
        >
            <button
                class="btn btn-start2 mb-4 rounded-custom w-100 text-start shadow-lg"
            >
                Babak 1 <img class="float-end" src="{{ asset('assets/img/Group.png') }}"  alt="" />
            </button>
            <button
                class="btn btn-start2 mb-4 rounded-custom w-100 text-start shadow-lg"
            >
                Babak 2 <img class="float-end" src="{{ asset('assets/img/Group.png') }}" alt="" />
            </button>
            <button
                class="btn btn-start2 mb-4 rounded-custom w-100 text-start shadow-lg"
            >
                Babak 3 <img class="float-end" src="{{ asset('assets/img/Group.png') }}" alt="" />
            </button>
            <button
                class="btn btn-start2 rounded-custom w-100 text-start shadow-lg"
            >
                Final <img class="float-end" src="{{ asset('assets/img/Group.png') }}" alt="" />
            </button>
        </div>
    </div>
</div>
@endsection
