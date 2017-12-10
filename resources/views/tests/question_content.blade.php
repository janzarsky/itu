@extends('tests.question')

@section('question')

<div class="row mb-4">
    <div class="{{ ($question->question_type == 'image') ?
                'col-md-8 offset-md-2' : 'col-md-12' }}">
        <div class="card {{ ($question->question_type == 'image') ?
                             'image-limit-height' : '' }}">
        @if ($question->question_type == 'image')
            <img class="card-img-top"
                src="{{ $animals->first()->image_url }}"
                alt="{{ $animals->first()->name }}">
        @endif

            <div class="card-body">
            @if ($question->question_type == 'name')
                <h3 class="card-title">
                    {{ $animals->first()->name }}
                </h3>
            @elseif ($question->answer_type == 'name')
                <h3 class="card-title">?</h3>
            @endif

                <span class="large-text">
                @if ($question->question_type == 'description')
                    {{ $animals->first()->description }}
                @elseif ($question->answer_type == 'description')
                    ?
                @endif
                </span>
            </div>
        </div>
    </div>
</div>

@php
    $shuffled = $animals->shuffle();
@endphp

{{ Form::open(['routes' => 'tests.answer', 'method' => 'get']) }}

<div class="row mb-4">
    <div class="col-md-12">
        <div class="card-deck questions">
        @foreach ($shuffled as $a)
            <input class="form-check-input" type="radio"
                name="answer" id="answerRadio{{ $a->id }}" value="{{ $a->id }}">
            <label class="card p-2" for="answerRadio{{ $a->id }}">
            @if ($question->answer_type == 'image')
                <div class="image-crop">
                    <img class="card-img-top"
                        src="{{ $a->image_url }}" alt="{{ $a->name }}">
                </div>
            @else
                <div class="card-body">
                @if ($question->answer_type == 'name')
                    <h3 class="card-title">
                        {{ $a->name }}
                    </h3>
                @endif

                @if ($question->answer_type == 'description')
                    {{ $a->description }}
                @endif
                </div>
            @endif
            </label>
        @endforeach
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <button type="submit" id="submitButton"
            class="float-right btn btn-primary btn-lg"
            disabled>Odpovědět</button>
    </div>
</div>

{{ Form::close() }}

@endsection
