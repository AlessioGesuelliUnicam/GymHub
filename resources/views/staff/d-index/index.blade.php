@extends('staff.d-index.layout-bootstrap')
@section('content')
@if(count($staffs) == 0)

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
    @foreach($staffs as $staff)
    <tr>
        <th>{{$staff -> name}}</th>
        <th>{{$staff -> surname}}</th>
        <th>{{$staff -> birth_date}}</th>
        <th>{{$staff -> city_residence}}</th>
        <th>{{$staff -> address_residence}}</th>
        <th>{{$staff -> phone_number}}</th>
        <th>{{$staff -> email}}</th>
        <th>{{$staff -> id_role}}</th>
    </tr>

    @endforeach

    </tbody>
</table>
@endif
@endsection
