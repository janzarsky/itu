@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row page-photo" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/f/f6/Pembroke_Welsh_Corgi_Puppy.jpg');
    background-position: center 38%;"></div>
</div>

<div class="container main-container">
    <div class="row">
        <div class="col-md-12 mb-3">
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
