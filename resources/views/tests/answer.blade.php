@extends('tests.question')

@section('question')

<div class="row mb-5">
    <div class="col-md-12">
        <div class="card-deck">
            <div class="card border-success">
                <div class="image-crop">
                    <img class="card-img-top"
                        src="{{ $animals->first()->image_url }}"
                        alt="{{ $animals->first()->name }}">
                </div>
                <div class="card-body">
                    <h3 class="card-title {{ ($question->answer_type == 'name') ?
                                              'text-success' : '' }}">
                        {{ $animals->first()->name }}
                    </h3>
                    
                    <span class="large-text {{ ($question->answer_type == 'description') ?
                                              'text-success' : '' }}">
                        {{ $animals->first()->description }}
                    </span>
                </div>
            </div>

        @foreach ($animals as $a)
            @if (!$loop->first)
                <div class="card {{ ($a->id == $animal_id) ?
                            'border-danger' : 'border-secondary' }}">
                    <div class="image-crop">
                        <img class="card-img-top" src="{{ $a->image_url }}"
                            alt="{{ $a->name }}">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title {{ ($a->id == $animal_id &&
                                        $question->answer_type == 'name')
                                        ? 'text-danger' : 'text-secondary' }}">
                            {{ $a->name }}
                        </h3>
                        
                        <span class="{{ ($a->id == $animal_id &&
                                        $question->answer_type == 'description')
                                        ? 'text-danger' : 'text-secondary' }}">
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
