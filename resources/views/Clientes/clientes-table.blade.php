@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{route('form-clientes')}}" class="btn btn-success btn-sm">
                <i class="bi bi-file-plus"></i>
            </a>
        </div>
    </div>
    <x-ui.table-component :headers="['ID', 'Cliente', 'NIT', 'E-mail', 'Telefono', 'Direccion', 'Acciones']">
        @foreach ($clients as $client)
            <tr>
                <td>
                    {{ $client->id }}
                </td>
                <td>
                    {{ $client->name }}
                </td>
                <td>
                    {{ $client->nit }}
                </td>
                <td>
                    {{ $client->email }}
                </td>
                <td>
                    {{ $client->phone_number_1 }}
                </td>
                <td>
                    {{ $client->addresses->first()->address_line }}
                </td>
                <td class="p-4">
                    <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
                        <a href="{{ route('client-edit-vw', ['id' => $client->id]) }}"
                            class="btn btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <button type="button"
                            class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-ui.table-component>
</div>
@endsection
