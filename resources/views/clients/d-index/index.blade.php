@extends('layouts.app')
@section('content')

@if(session('Successo'))
<div class="alert alert-success">
    {{session('Successo')}}

</div>
@endif

@if(count($clients) == 0)

<h1 class="text-center">Non ci sono dati.</h1>
<a style="color: white;" href="{{route('clients.create')}}">Nuovo cliente</a>
@else
<div class="flex flex-col">
    <h2 class="font-semibold  text-xl p-6 bg-gray-50 dark:bg-gray-800 font-semibold  text-white ">
        {{ __('Clienti') }}
    </h2>
    <div class="overflow-x-auto sm:rounded-lg p-4">
        <div class="inline-block">
            <div class="shadow-md">
                <table class="text-center text-sm font-light ">
                    <thead
                        class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="hidden">ID</th>
                        <th scope="col" class="px-6 py-4  text-white">Nome</th>
                        <th scope="col" class="px-6 py-4 text-white">Cognome</th>
                        <th scope="col" class="px-6 py-4  text-white">Data di nascita</th>
                        <th scope="col" class="px-6 py-4  text-white">Città</th>
                        <th scope="col" class="px-6 py-4  text-white">Indirizzo</th>
                        <th scope="col" class="px-6 py-4  text-white">Telefono</th>
                        <th scope="col" class="px-6 py-4  text-white">Email</th>
                        <th scope="col" class="px-6 py-4  text-white">Certificato medico</th>
                        <th scope="col" class="px-6 py-4  text-white">Scadenza certificato</th>
                        <th scope="col" class="px-6 py-4  text-white">Ingresso gratuito</th>
                        <th scope="col" class="px-6 py-4  text-white">Codice fiscale</th>
                        <th scope="col" class="px-6 py-4  text-white">Modifica</th>
                        <th scope="col" class="px-6 py-4  text-white">Elimina</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                    <tr class="bg-white border-b">
                        <td class="whitespace-nowrap  px-6 py-4" style="display: none">{{$client -> id}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> name}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> surname}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> birth_date}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> city_residence}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> address_residence}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> phone_number}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> email}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> med_cert}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> med_cert_exp}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> free_entry}}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{$client -> CF}}</td>
                        <td>
                            <a class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500" href="{{ route('clients.edit' , ['client' => $client->id]) }}">Modifica</a>
                        </td>
                        <td>
                            <form method='POST' action="{{ route('clients.destroy', ['client' => $client->id]) }}">
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
        <a href="{{route('clients.create')}}">Nuovo cliente</a>
    </button>
</div>



@endif
@endsection
