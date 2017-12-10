@extends('layouts.app')

@section('content')
<div class="container main-container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="jumbotron">
                <h2 class="display-4">Hotovo!</h2>
                <p class="lead">Test {{ $test->name }} dokončen, správně
                    zodpovězeno {{ $result->correct }} z
                    {{ $question_count }} otázek.</p>
                <p class="display-5">
                    {{ round(100*$result->correct/$question_count, 1) }} %</p>
                <p class="lead">
                <a href="{{ route('tests.take', ['id' => $test->id]) }}"
                    class="btn btn-lg btn-primary">Zkus to znovu</a>
                <a href="{{ route('tests') }}"
                    class="btn btn-lg">Zpět k testům</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
