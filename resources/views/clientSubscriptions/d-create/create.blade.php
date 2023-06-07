@extends('clientSubscriptions.d-create.layout-bootstrap-create')

@section('content')
<form method="POST" action="{{route('clientSubscriptions.store')}}">

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
        <label for="title">Cliente:</label>
        <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="title">Abbonamento:</label>
        <input type="text" class="form-control" name="surname" placeholder="Cognome" value="{{ old('surname') }}">
    </div>

    <div class="form-group">
        <label for="title">Data di inizio:</label>
        <input type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}">
    </div>

    <div class="form-group">
        <label for="title">Data di fine:</label>
        <input type="text" class="form-control" name="city_residence" placeholder="Città"
               value="{{ old('city_residence') }}">
    </div>

    <button type="submit" class="btn btn-success">Salva</button>

</form>

@endsection
