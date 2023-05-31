@extends('clientSubscriptions.d-index.layout-bootstrap')
@section('content')
@if(count($clientSubscriptions) == 0)

<h1 class="text-center">Non ci sono dati.</h1>

@else

<table class="table table-striped">
    <thead>
    <tr>
        <th>Cliente</th>
        <th>Abbonamento</th>
        <th>Inizio Abbonamento</th>
        <th>Fine Abbonamento</th>
    </tr>
    </thead>

    <tbody>
    @foreach($clientSubscriptions as $clientSubscription)
    <tr>
        <th>{{$clientSubscription -> client_id}}</th>
        <th>{{$clientSubscription -> subscription_id}}</th>
        <th>{{$clientSubscription -> start_subscription}}</th>
        <th>{{$clientSubscription -> end_subscription}}</th>

    </tr>

    @endforeach

    </tbody>
</table>
@endif
@endsection
