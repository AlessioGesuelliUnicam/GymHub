@extends('roles.d-edit.layout-bootstrap-edit')
@section('content')

<form method="POST" action="{{route('roles.update', ['role' => $role->id])}}">

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
        <label for="title">Nome:</label>
        <input type="text" class="form-control" name="name_roles" placeholder="Nome ruolo" value="{{ old('role_name', $role->type) }}">
    </div>

    <button type="submit" class="btn btn-success">Salva</button>

</form>
@endsection
