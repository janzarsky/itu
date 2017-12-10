@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row page-photo" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/a/ad/Baby_Hedgehog.jpg');
    background-position: center 45%;"></div>
</div>

<div class="container main-container">
    <div class="row">
        <div class="col-md-12 mb-3">
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
