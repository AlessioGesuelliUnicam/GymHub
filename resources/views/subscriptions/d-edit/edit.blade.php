@extends('layouts.app')
@section('content')

<div class="p-4 sm:ml-64 text-white">
    <div class="p-4 dark:border-gray-700">
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
                <p class="text-2xl font-semibold text-xl p-6 ">Modifica dell'abbonamento</p>
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
            <form method="POST" action="{{route('subscriptions.update', ['subscription' => $subscription->id])}}">

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

                <div class="form-group mb-6 mt-10">
                    <label for="duration">Durata:</label>
                    <input type="text"
                           class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="duration" placeholder="Nome" value="{{ old('duration', $subscription->duration) }}">
                </div>
                <div class="form-group mb-6">
                    <label for="price"
                    >Prezzo:</label>
                    <input type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="price" placeholder="Cognome" value="{{ old('price', $subscription->price) }}">
                </div>

                <button type="submit"
                        class="mb-10 text-white bg-red-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Salva
                </button>

            </form>
        </div>
    </div>
</div>

@endsection
