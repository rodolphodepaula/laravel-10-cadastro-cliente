<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Detalhes do Cliente') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100 ">
                  <p class="mb-4">
                    Exibindo detalhes do cliente {{ $client->name }}
                  </p>
                  <p>
                    <a href="{{ route('client.my', Auth::user()->id) }}" class="bg-blue-500 text-white rounded p-2">Meus clientes</a>
                    <a href="{{ route('client.edit', $client->id) }}" class="bg-gray-500 text-white rounded p-2">Editar</a>
                    <a href="#!" class="bg-red-500 text-white rounded p-2">Deletar</a>
                  </p>
              </div>

              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <p><strong>Nome: </strong> {{ $client->name }}</p>
                  <p><strong>E-mail: </strong> {{ $client->email }} | {{ $client->phone }}</p>
                  <p><strong>Empresa: </strong> {{ $client->company }} | {{ $client->company_phone }}</p>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
