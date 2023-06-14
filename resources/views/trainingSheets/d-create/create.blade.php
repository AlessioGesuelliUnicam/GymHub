@extends('trainingSheets.d-create.layout-bootstrap-create')

@section('content')
<form method="POST" action="{{route('trainingSheets.store')}}">

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
        <label for="title">Cliente:</label><br>
        <input list="clienti" class="form-control" name="clients" placeholder="Cliente">
        <datalist id="clienti">
            @foreach($clients as $client)
                <option value="{{ $client->id }} {{ $client->name }} {{ $client->surname }}">
            @endforeach
        </datalist>
    </div>

    <div class="form-group">
        <label for="title">Scheda di allenamento:</label>
        <input type="file" class="form-control" name="trainingSheet" value="{{ old('trainingSheet') }}">
    </div>

    <button type="submit" class="btn btn-success">Salva</button>

</form>

@endsection
