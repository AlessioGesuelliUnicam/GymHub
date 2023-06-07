@extends('diets.d-index.layout-bootstrap')
@section('content')
    @if(count($diets) == 0)

        <h1 class="text-center">Non ci sono dati.</h1>

    @else

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Dieta</th>
                <th>Cliente</th>
            </tr>
            </thead>

            <tbody>
            @foreach($diets as $diet)
                <tr>
                    <th>{{$diet -> diet}}</th>
                    <th>{{$diet -> client_id}}</th>

                    <th>
                        <a class="btn btn-success" href="{{ route('diets.edit' , ['diet' => $diet->id]) }}">Modifica</a>
                    </th>

                    <th>
                        <form method='POST' action="{{ route('diets.destroy', ['diet' => $diet->id]) }}">
                            @csrf
                            @method('DELETE')

                            <input class="btn btn-danger" type="submit" value="Elimina">
                        </form>
                    </th>

                </tr>

            @endforeach

            </tbody>
        </table>
    @endif
@endsection
