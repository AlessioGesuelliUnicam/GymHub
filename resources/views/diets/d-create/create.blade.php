@extends('layouts.app')
@section('content')


<div class="p-4 sm:ml-64 text-white">
    <div class="p-4 dark:border-gray-700 mt-16">
        <div class="grid grid-cols-2 mb-4 text-white bg-gray-800 rounded uppercase">
            <div class="flex items-center justify-center h-24">
                <p class="text-2xl font-semibold text-xl p-6 ">Nuova Dieta</p>
            </div>
            <div class="flex items-center justify-center h-24">
                <button class="py-2 px-4 rounded-full hover:bg-gray-700">
                    <a href="{{route('dashboard')}}">
                        <svg aria-hidden="true"
                             class="w-6 h-6"
                             fill="#f56565" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        </svg>
                    </a>
                </button>
            </div>
        </div>
        <div class="flex justify-center h-full rounded bg-gray-50 dark:bg-gray-800">
            <form method="POST" action="{{route('diets.store')}}">

                @csrf
                @method('POST')

                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <br>
                <div class="form-group">
                    <label for="title">Cliente:</label><br>
                    <input list="clienti" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           autocomplete="off" name="client_id" placeholder="Cliente">
                    <datalist id="clienti">
                        @foreach($clients as $client)
                        <option value="{{ $client->id }} {{ $client->name }} {{ $client->surname }}">
                            @endforeach
                    </datalist>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Dieta:</label>
                    <input type="file" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="diet" value="{{ old('diet') }}">
                </div>
                <br>
                <center>
                    <button type="submit"
                            class="mb-10 bg-red-400 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900">
                        Salva
                    </button>
                </center>
            </form>
        </div>
    </div>
</div>
@endsection
