@extends('layouts.app')

@section('content')
<div class="container main-container">
    <div class="row">
        <div class="col-md-12">
            <h2>Test {{ $test->name }}, otázka č. {{ $question->position }}</h2>
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
