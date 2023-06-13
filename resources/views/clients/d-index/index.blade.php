@extends('layouts.app')
@section('content')

@if(session('Successo'))
<div class="">
    {{session('Successo')}}

</div>
@endif

@if(count($clients) == 0)

<h1 class="text-center">Non ci sono dati.</h1>
<a style="color: white;" href="{{route('clients.create')}}">Nuovo cliente</a>

@else
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700">
        <div class="grid grid-cols-3 mb-4 text-white bg-gray-800 rounded uppercase">
            <div class="flex items-center justify-center h-24">
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                        aria-controls="default-sidebar" type="button" class="sm:hidden ">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                              d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-center h-24">
                <p class="text-2xl font-semibold text-xl p-6 ">Clienti</p>
            </div>
            <div class="flex items-center justify-center h-24">
                <button class="py-2 px-4 rounded-full hover:bg-red-500">
                    <a href="{{route('clients.create')}}">
                        <svg aria-hidden="true"
                             class="w-6 h-6 hover:fill-white"
                             fill="#f56565" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                        </svg>
                    </a>
                </button>
            </div>
        </div>
        <div class="flex h-48 mb-4">
            <div class="max-w-full" style="width: 100%">
                <div class="p-2 relative overflow-x-auto">
                    <table class="w-full text-center  text-sm font-light shadow-md table-auto">
                        <thead class="text-xs bg-gray-50 dark:bg-gray-800 uppercase">
                        <tr>
                            <th scope="col" class="hidden w-1/12">ID</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Nome</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Cognome</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Data di nascita</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Città</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Indirizzo</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Telefono</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Email</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Certificato medico</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Scadenza certificato</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Ingresso gratuito</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Codice fiscale</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Modifica</th>
                            <th scope="col" class="px-6 py-4 text-white w-1/12">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                        <tr class="bg-white border-b">
                            <td class="whitespace-nowrap   px-6 py-4 hidden w-1/12">{{$client -> id}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> name}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> surname}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> birth_date}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> city_residence}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> address_residence}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> phone_number}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> email}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> med_cert}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> med_cert_exp}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> free_entry}}</td>
                            <td class="whitespace-nowrap  px-6 py-4 w-1/12">{{$client -> CF}}</td>
                            <td>
                                <a class="bg-gray-800 text-white py-2 px-4 rounded-full right-0 hover:bg-red-500"
                                   href="{{ route('clients.edit' , ['client' => $client->id]) }}">Modifica</a>
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
</div>




@endif
@endsection
