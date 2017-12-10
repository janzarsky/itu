@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row page-photo" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/a/a5/Red_Kitten_01.jpg');
    background-position: center 65%;"></div>
</div>

<div class="container main-container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <h2>Moje statistiky</h2>
        </div>
        
        <div class="col-md-12">
            <div class="card-deck">
            @foreach ($tests as $t)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $t->name }}
                        </h4>
                        <p class="card-text">
                            Počet pokusů: {{ $t->attempts }}<br/>
                            @if ($t->attempts > 0)
                                Průměrná úspěšnost: {{ $t->average }} %
                            @else
                                &nbsp;
                            @endif
                        </p>
                        <p class="card-text">
                            <a href="{{ route('tests.take', ['id' => $t->id]) }}"
                                class="btn btn-lg btn-primary">Spustit test</a>
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
