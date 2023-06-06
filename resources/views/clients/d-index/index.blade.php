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
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-center text-sm font-light ">
                    <thead
                        class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="p-4 hidden text-white">ID</th>
                        <th scope="col" class=" px-6 py-4 text-white">Nome</th>
                        <th scope="col" class=" px-6 py-4 text-white">Cognome</th>
                        <th scope="col" class=" px-6 py-4 text-white">Data di nascita</th>
                        <th scope="col" class=" px-6 py-4 text-white">Città</th>
                        <th scope="col" class=" px-6 py-4 text-white">Indirizzo</th>
                        <th scope="col" class=" px-6 py-4 text-white">Telefono</th>
                        <th scope="col" class=" px-6 py-4 text-white">Email</th>
                        <th scope="col" class=" px-6 py-4 text-white">Certificato medico</th>
                        <th scope="col" class=" px-6 py-4 text-white">Scadenza certificato</th>
                        <th scope="col" class=" px-6 py-4 text-white">Ingresso gratuito</th>
                        <th scope="col" class=" px-6 py-4 text-white">Codice fiscale</th>
                        <th scope="col" class=" px-6 py-4 text-white">Modifica</th>
                        <th scope="col" class=" px-6 py-4 text-white">Elimina</th>
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
                            <a class="btn btn-success" href="{{ route('clients.edit' , ['client' => $client->id]) }}">Modifica</a>
                        </td>
                        <td>
                            <form method='POST' action="{{ route('clients.destroy', ['client' => $client->id]) }}">
                                @csrf
                                @method('DELETE')

                                <input class="btn btn-danger" type="submit" value="Elimina">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <button>
        <a href="{{route('clients.create')}}">Nuovo cliente</a>
    </button>
</div>
@endif
@endsection
