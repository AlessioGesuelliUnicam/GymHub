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
        <input list="cliente" class="form-control" autocomplete="off" name="cliente" placeholder="Cliente" value="{{ old('client') }}">
        <datalist id="cliente">
            @foreach($clients as $client)
                <option value="{{$client->id.' '.$client->name.' '.$client->surname }}">
            @endforeach
        </datalist>

    </div>

    <div class="form-group">
        <label for="title">Abbonamento:</label>
        <input list="abbonamenti" class="form-control" name="subscription" placeholder="Abbonamento" value="{{ old('subscriptions') }}">
        <datalist id="abbonamenti">
            @foreach($subscriptions as $subscription)
                <option value="{{$subscription -> duration}}">
            @endforeach
        </datalist>
    </div>

    <div class="form-group">
        <label for="title">Data di inizio:</label>
        <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
    </div>

    <button type="submit" class="btn btn-success">Salva</button>

</form>

@endsection
