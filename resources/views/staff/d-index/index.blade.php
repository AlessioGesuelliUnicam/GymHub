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
    </tr>

    @endforeach

    </tbody>
</table>
@endif
@endsection
