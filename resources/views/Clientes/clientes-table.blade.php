<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-ui.table-component :headers="['ID', 'Cliente','NIT','E-mail','Telefono','Direccion', 'Acciones']">
                        @foreach ($clients as $client)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">
                                    {{ $client->id }}
                                </td>
                                <td class="p-4">
                                    {{ $client->name }}
                                </td>
                                <td class="p-4">
                                    {{ $client->nit }}
                                </td>
                                <td class="p-4">
                                    {{ $client->email }}
                                </td>
                                <td class="p-4">
                                    {{ $client->phone_number_1 }}
                                </td>
                                <td class="p-4">
                                    {{ $client->addresses->first()->address_line }}
                                </td>
                                <td class="p-4">
                                    <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
                                        <a href="{{route('client-edit-vw',['id'=> $client->id])}}" class="rounded-l inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase hover:bg-green-700 focus:bg-purple-700 focus:outline-none focus:ring-0 active:bg-purple-800 transition duration-150 ease-in-out">
                                            <i class="fas fa-pencil"></i>
                                        </a>

                                        <button type="button"
                                            class="rounded-r inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase hover:bg-red-700 focus:bg-purple-700 focus:outline-none focus:ring-0 active:bg-purple-800 transition duration-150 ease-in-out">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-ui.table-component>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
