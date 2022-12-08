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
    <x-ui.table-component :headers="['ID', 'Cliente', 'NIT', 'E-mail', 'Telefono', 'Direcciones', 'Acciones']">
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
                <td align="center">
                    <x-ui.modal title="Direcciones Cliente" id="addressesModal">
                        <a class="btn btn-success" href="#" role="button">Agregar</a>
                        <x-ui.table-component :headers="['Direccion','ciudad','Accion']">
                            @foreach ($client->addresses as $address)
                                <tr>
                                    <td>{{$address->address_line}}</td>
                                    <td>{{$address->city->name}}</td>
                                    <td>
                                        <a class="btn btn-danger" href="#" role="button">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </x-ui.table-component>
                    </x-ui.modal>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addressesModal">
                            <i class="bi bi-card-checklist"></i>
                    </button>
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
