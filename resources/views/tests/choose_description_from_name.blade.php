@extends('tests.question')

@section('question')

<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    {{ $animals[0]->name }}
                </h3>

                ?
            </div>
        </div>
    </div>
</div>

@php
    $shuffled = $animals->shuffle();
@endphp

{{ Form::open(['routes' => 'tests.answer', 'method' => 'get']) }}

<div class="row mb-3">
@foreach ($shuffled as $a)
    <div class="col-md-4">
        <div class="form-check answer-form-check">
            <input class="form-check-input" type="radio" name="answer"
                id="answerRadio{{ $a->id }}" value="{{ $a->id }}">
            <label class="card" for="answerRadio{{ $a->id }}">
                <div class="card-body">
                    {{ $a->description }}
                </div>
            </label>
        </div>
    </div>
@endforeach
</div>

<div class="row">
    <div class="col-md-12">
        <button type="submit" class="float-right btn btn-primary btn-lg">Odpovědět</button>
    </div>
</div>

{{ Form::close() }}

@endsection