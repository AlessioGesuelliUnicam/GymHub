@extends('diets.d-edit.layout-bootstrap-edit')
@section('content')

<form method="POST" action="{{route('diets.update', ['diet' => $diet->id])}}">

    @csrf
    @method('PUT')

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
        <label for="title">Dieta:</label>
        <input type="file" class="form-control" name="diet" value="{{ old('diet', $diet->diet) }}">
    </div>

    <div class="form-group">
        <label for="title">Cliente:</label>
        <input type="text" class="form-control" name="client_id" placeholder="Cliente" value="{{ old('client_id', $diet->client_id) }}">
    </div>

    <button type="submit" class="btn btn-success">Salva</button>

</form>
@endsection
