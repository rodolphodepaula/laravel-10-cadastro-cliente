<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Clientes') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>
              </div>

              <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('client.create') }}" class="bg-gray-500 text-white rounded p-2">Adicionar</a>
                <a href="{{ route('client.my', Auth::user()->id) }}" class="bg-blue-500 text-white rounded p-2">Meus clientes</a>
              </div>

              <div class="p-6 text-gray-900 dark:text-gray-100">

                <div class="p-3 bg-gray-100 rounded-lg mb-4">
                    {{ $clients->links() }}
                </div>

                <table class="table-auto w-full">
                  <thead class="text-left bg-gray-100">
                    <tr>
                      <th class="p-2">Nome</th>
                      <th>Email</th>
                      <th>Telefone</th>
                      <th>Usuário</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($clients as $client)
                      <tr class="hover:bg-gray-100">
                        <td class="p-2">{{ $client->name }}</td>
                        <td class="p-2">{{ $client->email }}</td>
                        <td class="p-2">{{ $client->phone }}</td>
                        <td class="p-2">{{ $client->user->name }}</td>
                      </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
