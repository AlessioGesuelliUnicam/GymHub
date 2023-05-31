@extends('roles.d-index.layout-bootstrap')
@section('content')
    @if(session('Successo'))
        <div class="alert alert-success">
            {{session('Successo')}}
        </div>
    @endif
    @if(session('Fallimento'))
        <div class="alert alert-success">
            {{session('Fallimento')}}
        </div>
    @endif
@if(count($roles) == 0)

<h1 class = "text-center">Non ci sono dati.</h1>

@else

<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tipo</th>
    </tr>
    </thead>

    <tbody>
    @foreach($roles as $role)
    <tr>
        <td>{{$role -> id}}</td>
        <td>{{$role -> type}}</td>
        <td>
            <a class="btn btn-success" href="{{ route('roles.edit' , ['role' => $role->id]) }}">Modifica</a>
        </td>

        <td>
            <form method='POST' action="{{ route('roles.destroy', ['role' => $role->id]) }}"></form>
                @csrf
                @method('DELETE')

                <input class="btn btn-danger" type="submit" value="Elimina">
        </td>
    </tr>

    @endforeach

    </tbody>
</table>
@endif
@endsection
