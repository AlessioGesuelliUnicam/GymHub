@extends('diets.d-index.layout-bootstrap')
@section('content')
    @if(count($diets) == 0)

        <h1 class="text-center">Non ci sono dati.</h1>

    @else

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Dieta</th>
                <th>Cliente</th>
            </tr>
            </thead>

            <tbody>
            @foreach($diets as $diet)
                <tr>
                    <th>{{$diet -> diet}}</th>
                    <th>{{$diet -> client_id}}</th>
                </tr>

            @endforeach

            </tbody>
        </table>
    @endif
@endsection
