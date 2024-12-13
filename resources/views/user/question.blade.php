@extends('user/layout') 

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
    
            <div>
                <button class="btn-submit2 rounded-2">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
@endsection
