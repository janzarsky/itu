@extends('tests.question')

@section('question')

<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{ $animals[0]->description }}
            </div>
        </div>
    </div>
</div>

@php
    if ($animal_id === -1) {
        $shuffled = $animals->shuffle();
    }
    else {
        $shuffled = $animals;
    }
@endphp

<div class="row">

@foreach ($shuffled as $a)
<div class="col-md-4">
    <a href="{{ route('tests.answer', ['id' => $test->id,
             'question_num' => $question->position,
             'animal_id' => $a->id]) }}">
        <div class="card">
            <div class="card-body">
            @if ($animal_id === -1)
                    {{ $a->name }}
            @elseif ($loop->first)
                Správná odpověď: {{ $a->name }}
            @else
                {{ $a->name }}
            @endif
            </div>
        </div>
    </a>
</div>
@endforeach

</div>

@endsection
