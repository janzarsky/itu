@extends('layouts.app')

@section('content')
<div class="container main-container">
    <div class="row">
        <div class="col-md-12">
            <h2>Testy</h2>
        </div>
        
    @foreach ($tests as $t)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $t->name }}</h4>
                    <p class="card-text">
                        Obtížnost:
                        @if ($t->difficulty === 1)
                            Lehká
                        @elseif ($t->difficulty === 2)
                            Střední
                        @else
                            Těžká
                        @endif
                    </p>
                    <a href="{{ route('tests.take', ['id' => $t->id]) }}"
                        class="btn btn-primary">Spustit test</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
