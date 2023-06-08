@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('clients.store')}}">

    @csrf
    @method('POST')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-group">
        <label for="title">Nome:</label>
        <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="title">Cognome:</label>
        <input type="text" class="form-control" name="surname" placeholder="Cognome" value="{{ old('surname') }}">
    </div>

    <div class="form-group">
        <label for="title">Data di nascita:</label>
        <input type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}">
    </div>

    <div class="form-group">
        <label for="title">Città:</label>
        <input type="text" class="form-control" name="city_residence" placeholder="Città"
               value="{{ old('city_residence') }}">
    </div>

    <div class="form-group">
        <label for="title">Indirizzo:</label>
        <input type="text" class="form-control" name="address_residence" placeholder="Indirizzo"
               value="{{ old('address_residence') }}">
    </div>

    <div class="form-group">
        <label for="title">Telefono:</label>
        <input type="text" class="form-control" name="phone_number" placeholder="Telefono"
               value="{{ old('phone_number') }}">
    </div>

    <div class="form-group">
        <label for="title">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label for="title">Certificato medico:</label><br>
        <input type="file" class="form-control" name="med_cert" value="{{ old('med_cert') }}">
    </div>

    <div class="form-group">
        <label for="title">Data di scadenza certificato medico:</label>
        <input type="date" class="form-control" name="med_cert_exp" value="{{ old('med_cert_exp') }}">
    </div>

    <div class="form-group">
        <label for="title">Ingresso gratuito:</label>
        <input type="date" class="form-control" name="free_entry" value="{{ old('med_cert_exp') }}">
    </div>

    <div class="form-group">
        <label for="title">Codice fiscale:</label>
        <input type="text" class="form-control" name="CF" placeholder="Codice fiscale" value="{{ old('CF') }}">
    </div>

    <button type="submit" class="btn btn-success">Salva</button>

</form>

@endsection
