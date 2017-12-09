@extends('tests.question')

@section('question')

<div class="row mb-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    {{ $animals->first()->name }}
                </h3>
                
                <span class="large-text {{ ($animals->first()->id == $animal_id) ?
                    'text-success' : '' }}">
                    {{ $animals->first()->description }}
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-12">
        <div class="card-deck">
        @foreach ($animals as $a)
            @if (!$loop->first)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-secondary">
                            {{ $a->name }}
                        </h3>
                        
                        <span class="{{ ($a->id == $animal_id) ? 'text-danger' :
                                        'text-secondary' }}">
                            {{ $a->description }}
                        </span>
                    </div>
                </div>
            @endif
        @endforeach
        </div>
    </div>
</div>

@endsection
