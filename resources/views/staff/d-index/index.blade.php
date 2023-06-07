@extends('staff.d-index.layout-bootstrap')
@section('content')
@if(count($staff) == 0)

<h1 class = "text-center">Non ci sono dati.</h1>

@else

<table class="table table-striped">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Data di nascita</th>
        <th>Città</th>
        <th>Indirizzo</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Ruolo</th>
    </tr>
    </thead>

    <tbody>
    @foreach($staff as $index => $staffMember)
    <tr>
        <td>{{$staffMember -> name}}</td>
        <td>{{$staffMember -> surname}}</td>
        <td>{{$staffMember -> birth_date}}</td>
        <td>{{$staffMember -> city_residence}}</td>
        <td>{{$staffMember -> address_residence}}</td>
        <td>{{$staffMember -> phone_number}}</td>
        <td>{{$staffMember -> email}}</td>
        <td>{{$roles[$index]}}</td>
        <td>
            <a class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500" href="{{ route('staff.edit', ['staff' => $staffMember->id]) }}">Modifica</a>
        </td>
        <td>
            <form method='POST' action="{{ route('staff.destroy', ['staff' => $staffMember->id]) }}">
                @csrf
                @method('DELETE')

                <input class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500" type="submit" value="Elimina">
            </form>
        </td>
    </tr>

    @endforeach

    </tbody>
</table>
@endif
@endsection
