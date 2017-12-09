@extends('tests.question')

@section('question')

<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    {{ $animals[0]->name }}
                </h3>
                {{ $animals[0]->description }}
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
@foreach ($animals as $a)
    <div class="col-md-4">
        <div class="card">
        @if ($a->id == $animal_id)
            @if ($loop->first)
                <div class="card-body large-text text-success">
                    &#10004; {{ $a->name }}
                </div>
            @else
                <div class="card-body large-text text-danger">
                    &#10006; {{ $a->name }}
                </div>
            @endif
        @else
            <div class="card-body large-text text-secondary">
                {{ $a->name }}
            </div>
        @endif
        </div>
    </div>
@endforeach
</div>

@endsection
