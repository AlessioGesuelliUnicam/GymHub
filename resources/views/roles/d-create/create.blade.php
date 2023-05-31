@extends('roles.d-create.layout-bootstrap-create')

@section('content')
<form method="POST" action="{{route('roles.store')}}">

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
        <label for="title">Nome ruolo:</label>
        <input type="text" class="form-control" name="name_roles" placeholder="Nome ruolo" value="{{ old('name_roles') }}">
    </div>

    <button type="submit" class="btn btn-success">Salva</button>

</form>

@endsection
