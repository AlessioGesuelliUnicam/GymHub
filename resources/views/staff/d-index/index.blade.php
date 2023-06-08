@extends('layouts.app')
@section('content')
@if(count($staff) == 0)

<h1 class="text-center">Non ci sono dati.</h1>
<a style="color: white;" href="{{route('diets.create')}}">Nuovo Membro Staff</a>

@else
<div class="flex flex-col">
    <h2 class="font-semibold  text-xl p-6 bg-gray-50 dark:bg-gray-800 font-semibold  text-white ">
        {{ __('Staff') }}
    </h2>
    <div class="overflow-x-auto sm:rounded-lg p-4">
        <div class="inline-block">
            <div class="shadow-md">
                <table class="text-center text-sm font-light ">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="hidden">ID</th>
                        <th scope="col" class="px-6 py-4  text-white">Nome</th>
                        <th scope="col" class="px-6 py-4  text-white">Cognome</th>
                        <th scope="col" class="px-6 py-4  text-white">Data di nascita</th>
                        <th scope="col" class="px-6 py-4  text-white">Città</th>
                        <th scope="col" class="px-6 py-4  text-white">Indirizzo</th>
                        <th scope="col" class="px-6 py-4  text-white">Telefono</th>
                        <th scope="col" class="px-6 py-4  text-white">Email</th>
                        <th scope="col" class="px-6 py-4  text-white">Ruolo</th>
                        <th scope="col" class="px-6 py-4  text-white">Modifica</th>
                        <th scope="col" class="px-6 py-4  text-white">Elimina</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($staff as $index => $staffMember)
                    <tr class="bg-white border-b">
                        <td class="whitespace-nowrap  px-6 py-4" style="display: none">{{$staffMember -> id}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$staffMember -> name}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$staffMember -> surname}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$staffMember -> birth_date}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$staffMember -> city_residence}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$staffMember -> address_residence}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$staffMember -> phone_number}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$staffMember -> email}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$roles[$index]}}</td>
                        <td>
                            <a class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500"
                               href="{{ route('staff.edit', ['staff' => $staffMember->id]) }}">Modifica</a>
                        </td>
                        <td>
                            <form method='POST' action="{{ route('staff.destroy', ['staff' => $staffMember->id]) }}">
                                @csrf
                                @method('DELETE')

                                <input class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500"
                                       type="submit" value="Elimina">
                            </form>
                        </td>
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
        <a href="{{route('staff.create')}}">Nuovo Membro Staff</a>
    </button>
</div>
@endif
@endsection
