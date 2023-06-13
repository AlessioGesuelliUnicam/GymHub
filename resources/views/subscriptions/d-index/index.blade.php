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
        <th>
            @if($subscription->duration > 1)
            {{ $subscription->duration . " MESI" }}
            @else
            {{ $subscription->duration . " MESE" }}
            @endif
        </th>
        <th>{{$subscription -> price . "€"}}</th>
        <td>
            <a class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500"
               href="{{ route('subscriptions.edit' , ['subscription' => $subscription->id]) }}">Modifica</a>
        </td>
        <td>
            <form method='POST' action="{{ route('subscriptions.destroy', ['subscription' => $subscription->id]) }}">
                @csrf
                @method('DELETE')

                <input class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500"
                       type="submit" value="Elimina">
            </form>
        </td>
    </tr>

    @endforeach

    </tbody>
</table>
@endif
@endsection
