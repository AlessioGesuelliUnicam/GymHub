@extends('layouts.app')
@section('content')
@if(count($diets) == 0)

<h1 class="text-center">Non ci sono dati.</h1>
<a style="color: white;" href="{{route('diets.create')}}">Nuova Dieta</a>

@else
<div class="flex flex-col">
    <h2 class="font-semibold  text-xl p-6 bg-gray-50 dark:bg-gray-800 font-semibold  text-white ">
        {{ __('Diete') }}
    </h2>
    <div class="overflow-x-auto sm:rounded-lg p-4">
        <div class="inline-block">
            <div class="shadow-md">
                <table class="text-center text-sm font-light ">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="hidden">ID</th>
                        <th scope="col" class="px-6 py-4  text-white">Dieta</th>
                        <th scope="col" class="px-6 py-4  text-white">Cliente</th>
                        <th scope="col" class="px-6 py-4  text-white">Modifica</th>
                        <th scope="col" class="px-6 py-4  text-white">Elimina</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($diets as $diet)
                    <tr class="bg-white border-b">
                        <td class="whitespace-nowrap  px-6 py-4" style="display: none">{{$diet -> id}}</td>
                        <th class="whitespace-nowrap  px-6 py-4">{{$diet -> diet}}</th>
                        <th class="whitespace-nowrap  px-6 py-4">{{$diet -> client_id}}</th>

                        <th>
                            <a class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500" class="btn btn-success"
                               href="{{ route('diets.edit' , ['diet' => $diet->id]) }}">Modifica</a>
                        </th>

                        <th>
                            <form method='POST' action="{{ route('diets.destroy', ['diet' => $diet->id]) }}">
                                @csrf
                                @method('DELETE')

                                <input class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500" type="submit" value="Elimina">
                            </form>
                        </th>

                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="p-4 right-0 absolute">
    <button class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500">
        <a href="{{route('diets.create')}}">Nuova Dieta</a>
    </button>
</div>
@endif
@endsection
