@extends('trainingSheets.d-index.layout-bootstrap')
@section('content')
@if(count($trainingSheets) == 0)

<h1 class = "text-center">Non ci sono dati.</h1>

@else

<table class="table table-striped">
    <thead>
    <tr>
        <th>Cliente</th>
        <th>Scheda</th>
    </tr>
    </thead>

    <tbody>
    @foreach($trainingSheets as $trainingSheet)
    <tr>
        <th>{{$trainingSheet -> client_id}}</th>
        <th>{{$trainingSheet -> training_sheet}}</th>
    </tr>

    @endforeach

    </tbody>
</table>
@endif
@endsection
