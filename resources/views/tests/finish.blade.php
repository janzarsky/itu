@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Test {{ $test->name }} dokončen
                </div>

                <div class="panel-body">
                    <h3>Výsledky:</h3>
                    
                    <p>TODO</p>

                    <p>
                        <a href="{{ route('tests') }}"
                            class="btn btn-primary">Zpět k testům</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
