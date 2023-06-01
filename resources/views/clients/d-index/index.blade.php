@extends('clients.d-index.layout-bootstrap')
@section('content')

@if(session('Successo'))
<div class="alert alert-success">
    {{session('Successo')}}
</div>
@endif

@if(count($clients) == 0)

<h1 class="text-center">Non ci sono dati.</h1>

@else

<table class="table table-striped">
    <thead>
    <tr>
        <th style="display: none">ID</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Data di nascita</th>
        <th>Città</th>
        <th>Indirizzo</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Certificato Medico</th>
        <th>Data di scadenza certificato</th>
        <th>Ingresso gratuito</th>
        <th>Codice fiscale</th>
        <th>Modifica</th>
        <th>Elimina</th>
    </tr>
    </thead>

    <tbody>
    @foreach($clients as $client)
    <tr>
        <td style="display: none">{{$client -> id}}</td>
        <td>{{$client -> name}}</td>
        <td>{{$client -> surname}}</td>
        <td>{{$client -> birth_date}}</td>
        <td>{{$client -> city_residence}}</td>
        <td>{{$client -> address_residence}}</td>
        <td>{{$client -> phone_number}}</td>
        <td>{{$client -> email}}</td>
        <td>{{$client -> med_cert}}</td>
        <td>{{$client -> med_cert_exp}}</td>
        <td>{{$client -> free_entry}}</td>
        <td>{{$client -> CF}}</td>
        <td>
            <a class="btn btn-success" href="{{ route('clients.edit' , ['client' => $client->id]) }}">Modifica</a>
        </td>

        <td>
            <form method='POST' action="{{ route('clients.destroy', ['client' => $client->id]) }}">
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
