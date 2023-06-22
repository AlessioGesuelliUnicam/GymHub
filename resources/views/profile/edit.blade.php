@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="mt-16 p-4">
        <div class="grid grid-cols-3 gap-4 mb-4">
            <!-- SEPARATORE -->
        </div>
    </div>
</div>
<div class="flex py-96 justify-center h-screen">
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700">
            <div class="flex items-center justify-center h-24 rounded">
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Profile') }}
                    </h2>
                </x-slot>
                <div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-10">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            @include('profile.partials.update-profile-information-form')
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            @include('profile.partials.update-password-form')
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
