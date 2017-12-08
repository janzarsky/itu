@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Test {{ $test->name }}, otázka č. {{ $question->position }}
                </div>

                <div class="panel-body">
                    @yield('question')

                    @if (isset($finish))
                        <a href="{{ route('tests.finish',
                                          ['id' => $test->id]) }}"
                            class="btn btn-primary">Dokončit test</a>
                    @elseif (isset($next))
                        <a href="{{ route('tests.question',
                                          ['id' => $next->test_id,
                                           'question_num' => $next->position]) }}"
                            class="btn btn-primary">Další otázka</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
