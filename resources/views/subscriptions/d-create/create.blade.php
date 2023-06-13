@extends('subscriptions.d-create.layout-bootstrap-create')

@section('content')
<form method="POST" action="{{route('subscriptions.store')}}">

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
        <label for="title">Durata:</label>
        <input type="text" class="form-control" name="duration" placeholder="Durata in mesi" value="{{ old('duration') }}">
    </div>

    <div class="form-group">
        <label for="title">Prezzo:</label>
        <input type="text" class="form-control" name="price" placeholder="Prezzo" value="{{ old('price') }}">
    </div>


    <button type="submit" class="btn btn-success">Salva</button>

</form>

@endsection
