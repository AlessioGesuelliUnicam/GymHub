<?php

use App\Models\Client;
use App\Models\ClientSubscription;
use App\Models\Staff;


$clientCount = Client::count();
$subscriptionCount = ClientSubscription::count();
$staffCount = Staff::count();
?>
@extends('layouts.app')
@section('content')

    <div class="p-4 sm:ml-64">
        <div class="mt-16 p-4 rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class=" items-start justify-start h-48 rounded bg-gray-50 dark:bg-red-800">
                    <p class="text-7xl text-white pt-10 pl-10 ">{{$clientCount}}</p>
                    <p class="text-sm text-white uppercase py-8 pl-8">Clienti totali</p>
                </div>
                <div class=" items-center justify-center h-48 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-7xl text-white pt-10 pl-10 ">{{$subscriptionCount}}</p>
                    <p class="text-sm text-white uppercase py-8 pl-8">Abbonamenti totali</p>
                </div>
                <div class=" items-center justify-center h-48 rounded bg-gray-50 dark:bg-yellow-800">
                    <p class="text-7xl text-white pt-10 pl-10 ">{{$staffCount}}</p>
                    <p class="text-sm text-white uppercase py-8 pl-8">Personale attivo</p>
                </div>
            </div>
            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
            </div>
            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
