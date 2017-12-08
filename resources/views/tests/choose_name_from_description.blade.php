@extends('tests.question')

@section('question')

<h2>Vyber zvíře odpovídající popisu</h2>

<p>
{{ $animals[0]->description }}
</p>

<ul>

@php
    if ($animal_id === -1) {
        $shuffled = $animals->shuffle();
    }
    else {
        $shuffled = $animals;
    }
@endphp

@foreach ($shuffled as $a)
<li>
    @if ($animal_id === -1)
        <a href="{{ route('tests.answer', ['id' => $test->id,
                 'question_num' => $question->position,
                 'animal_id' => $a->id]) }}">
            {{ $a->name }}</a>
    @elseif ($loop->first)
        Správná odpověď: {{ $a->name }}
    @else
        {{ $a->name }}
    @endif
</li>
@endforeach
</ul>

@endsection
