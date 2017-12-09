@extends('layouts.app')

@section('content')
<div class="container main-container">
    <div class="row">
        <div class="col-md-12">
            <h2>Zvířata</h2>
        </div>
        
        <div class="card-columns">
        @foreach ($animals as $a)
            <div class="card">
                <img class="card-img-top" src="{{ $a->image_url }}"
                    alt="{{ $a->name }}">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $a->name }}
                    </h4>
                    <p class="card-text">
                        {{ $a->description }}
                    </p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
