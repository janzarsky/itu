@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tests</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Test</th>
                                <th scope="col">Obtížnost</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tests as $t)
                            <tr>
                                <td>{{ $t->name }}</td>
                                <td>
                                @if ($t->difficulty === 1)
                                    Lehká
                                @elseif ($t->difficulty === 2)
                                    Střední
                                @else
                                    Těžká
                                @endif
                                </td>
                                <td>
                                    <a href="{{ route('tests.take', ['id' => $t->id]) }}"
                                        class="btn btn-primary">Spustit test</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
