@extends('clientSubscriptions.d-index.layout-bootstrap')
@section('content')
@if ($clientSubscriptions !== null && count($clientSubscriptions) == 0)

<h1 class="text-center">Non ci sono dati.</h1>

@else

<table class="table table-striped">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Inizio Abbonamento</th>
        <th>Fine Abbonamento</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['clients'] as $key => $client)
    <tr>
        <td>{{ $client['name'] }}</td>
        <td>{{ $client['surname'] }}</td>
        <td>{{ $data['clientSubscriptions'][$key]->start_subscription }}</td>
        <td>{{ $data['clientSubscriptions'][$key]->end_subscription }}</td>
        <td>
            <form method='POST' action="{{ route('clientSubscriptions.destroy', ['clientSubscription' =>  $data['clientSubscriptions'][$key]->id]) }}">
                @csrf
                @method('DELETE')

                <input class="btn btn-danger" type="submit" value="Elimina">
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>


@endif
@endsection
