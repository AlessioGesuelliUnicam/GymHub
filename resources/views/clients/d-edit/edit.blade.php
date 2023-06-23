@extends('layouts.app')
@section('content')


<div class="p-4 sm:ml-64 text-white">
    <div class="p-4 dark:border-gray-700 mt-16">
        <div class="grid grid-cols-2 mb-4 text-white bg-gray-800 rounded uppercase">
            <div class="flex items-center justify-center h-24">
                <p class="text-2xl font-semibold text-xl p-6 ">Modifica del cliente</p>
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
            <form method="POST" action="{{route('clients.update', ['client' => $client->id])}}">

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
                    <label for="name">Nome:</label>
                    <input type="text"
                           class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="name" placeholder="Nome" value="{{ old('name', $client->name) }}">
                </div>
                <div class="form-group mb-6">
                    <label for="surname"
                    >Cognome:</label>
                    <input type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="surname" placeholder="Cognome" value="{{ old('surname', $client->surname) }}">
                </div>

                <div class="form-group mb-6">
                    <label for="birth_date">Data di
                        nascita:</label>
                    <input type="date"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="birth_date" placeholder="Data di nascita"
                           value="{{ old('birth_date', $client->birth_date) }}">
                </div>

                <div class="form-group mb-6">
                    <label for="city_residence">Città:</label>
                    <input type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="city_residence" placeholder="Città"
                           value="{{ old('city_residence', $client->city_residence) }}">
                </div>

                <div class="form-group mb-6">
                    <label for="address_residence">Indirizzo:</label>
                    <input type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="address_residence" placeholder="Indirizzo"
                           value="{{ old('address_residence', $client->address_residence) }}">
                </div>

                <div class="form-group mb-6">
                    <label for="phone_number">Telefono:</label>
                    <input type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="phone_number" placeholder="Telefono"
                           value="{{ old('phone_number', $client->phone_number) }}">
                </div>

                <div class="form-group mb-6">
                    <label for="email">Email:</label>
                    <input type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="email" placeholder="Email" value="{{ old('email', $client->email) }}">
                </div>

                <div class="form-group mb-6">
                    <label for="med_cert">Certificato medico:</label>
                    <input type="file" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="med_cert" value="{{ old('med_cert') }}">
                </div>

                <div class="form-group mb-6">
                    <label for="med_cert_exp">Data di
                        scadenza certificato medico:</label>
                    <input type="date"
                           class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="med_cert_exp" placeholder="Scadenza certificato"
                           value="{{ old('med_cert_exp', $client->med_cert_exp) }}">
                </div>

                <div class="form-group mb-6">
                    <label for="free_entry">Ingresso gratuito:</label>
                    <input type="date"
                           class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="free_entry" placeholder="Ingresso gratuito"
                           value="{{ old('free_entry', $client->free_entry) }}">
                </div>

                <div class="form-group">
                    <label for="CF">Codice
                        fiscale:</label>
                    <input type="text"
                           class="mb-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           name="CF" placeholder="Codice fiscale" value="{{ old('CF', $client->CF) }}">

                </div>
                <div class="form-group">
                    <center>
                        <button type="submit"
                                class="mb-10 bg-red-400 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900">
                            Salva
                        </button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
