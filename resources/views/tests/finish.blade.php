@extends('layouts.app')

@section('content')
<div class="container main-container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Test {{ $test->name }} dokončen</h2>
            
            <p>Zodpovězeno správně {{ $result->correct }} z {{ $question_count }} otázek.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('tests') }}"
                class="btn btn-primary">Zpět k testům</a>
        </div>
    </div>
</div>
@endsection
