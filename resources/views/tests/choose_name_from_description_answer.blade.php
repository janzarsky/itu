@extends('tests.question')

@section('question')
<div class="row mb-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title 
                    {{ ($animals->first()->id == $animal_id) ? 'text-success' : '' }}">
                    {{ $animals->first()->name }}
                </h3>
                
                <span class="large-text">
                    {{ $animals->first()->description }}
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
@foreach ($animals as $a)
    @if (!$loop->first)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title 
                        {{ ($a->id == $animal_id) ? 'text-danger' :
                            'text-secondary' }}">
                        {{ $a->name }}
                    </h3>
                    
                    <span class="text-secondary">
                        {{ $a->description }}
                    </span>
                </div>
            </div>
        </div>
    @endif
@endforeach
</div>

@endsection
