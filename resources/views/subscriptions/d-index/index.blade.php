@extends('subscriptions.d-index.layout-bootstrap')
@section('content')
@if(count($subscriptions) == 0)

<h1 class = "text-center">Non ci sono dati.</h1>

@else

<table class="table table-striped">
    <thead>
    <tr>
        <th>Durata</th>
        <th>Prezzo</th>
    </tr>
    </thead>

    <tbody>
    @foreach($subscriptions as $subscription)
    <tr>
        <th>{{$subscription -> duration}}</th>
        <th>{{$subscription -> price}}</th>
    </tr>

    @endforeach

    </tbody>
</table>
@endif
@endsection
