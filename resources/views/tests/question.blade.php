@extends('layouts.app')

@section('content')
<div class="container main-container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>{{ $test->name }}</h2>

            <div class="progress">
                <div class="progress-bar" role="progressbar"
                    style="width: {{ 100*$question->position/$question_count }}%;">
                    {{ $question->position }}/{{ $question_count }}
                </div>
            </div>
        </div>
    </div>

    @yield('question')

    <div class="row">
        <div class="col-md-12">
            @if (isset($finish))
                <a href="{{ route('tests.finish',
                                  ['id' => $test->id]) }}"
                    class="btn btn-primary btn-large float-right">Dokončit test</a>
            @elseif (isset($next))
                <a href="{{ route('tests.question',
                                  ['id' => $next->test_id,
                                   'question_num' => $next->position]) }}"
                    class="btn btn-primary btn-large float-right">Další otázka</a>
            @endif
        </div>
    </div>
</div>
@endsection
