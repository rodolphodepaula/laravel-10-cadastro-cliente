<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>
                </div>
            </div>

            <div class="overflow-hidden shadow-sm sm:rounded-lg mt-4 grid grid-cols-2 gap-4">
                <div class="bg-white p-6 text-gray-900">
                    <p class="mb-4">
                        Clientes cadastrados {{ count($clients) }}
                    </p>
                    <p>
                        <a href="{{ route('client.my', Auth::user()->id) }}" class="bg-blue-500 text-white rounded p-2">Meus clientes</a>
                    </p>
                </div>
                <div class="bg-white p-6 text-gray-900">
                    <p class="mb-4">
                        Usuários cadastrados {{ count($users)}}
                    </p>
                    <p>
                        <a href="{{ route('user.index') }}" class="bg-blue-500 text-white rounded p-2">Usuarios</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
