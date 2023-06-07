@extends('diets.d-create.layout-bootstrap')

@section('content')
<form method="POST" action="{{route('diets.store')}}">

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
        <input list="clienti" class="form-control" name="client_id" placeholder="Cliente">
        <datalist id="clienti">

        </datalist>
    </div>

    <div class="form-group">
        <label for="title">Dieta:</label>
        <input type="file" class="form-control" name="diet" value="{{ old('diet') }}">
    </div>

    <button type="submit" class="btn btn-success">Salva</button>

</form>

@endsection
