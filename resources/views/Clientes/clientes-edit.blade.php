@extends('layouts.app')

@section('content')
<x-ui.card title="Agregar Cliente">

    <form action="{{ route('client-edit-form') }}" method="POST" autocomplete="off">
        @csrf
        <x-ui.input-component type="hidden" name="id" value="{{$client->id}}"/>
        <div class="form-group mb-6">
            <x-ui.select-component label="Tipo Cliente" name="tipoCliente" id="tipoCliente">
                <option selected>Selecciona una opcion</option>
                <option value="1" {{ ( $client->client_type == '1') ? 'selected' : '' }} >Formulador</option>
                <option value="2" {{ ( $client->client_type == '2') ? 'selected' : '' }}>Distribuidor</option>
            </x-ui.select-component>
        </div>
        <div class="form-group mb-6">
            <x-ui.input-component label="NIT" type="text" name="NIT" id="NIT"
                placeholder="Nit" value="{{$client->nit}}" />
        </div>
        <div class="form-group mb-6">
            <x-ui.input-component label="Nombre" type="text" name="nombre" id="nombre"
                placeholder="Nombre" value="{{$client->name}}"/>
        </div>
        <div class="form-group mb-6">
            <x-ui.input-component label="Email" type="email" name="mail" id="mail"
                placeholder="Email" value="{{$client->email}}"/>
        </div>
        <div class="form-group mb-6">
            <x-ui.select-component label="Ciudad" name="ciudad" id="ciudad">
                <option selected>Selecciona una opcion</option>
                @foreach ($cities as $city)
                <option value="{{$city->id}}" {{ ( $client->addresses->first()->city_id == $city->id) ? 'selected' : '' }} >{{$city->name}}</option>
                @endforeach
            </x-ui.select-component>
        </div>
        <div class="form-group mb-6">
            <x-ui.input-component label="Direccion" type="text" name="direccion" id="direccion"
                placeholder="Direccion" value="{{$client->addresses->first()->address_line}}"/>
        </div>
        <div class="form-group mb-6">
            <x-ui.input-component label="Telefono - 1" type="phone" name="tel1" id="tel1"
                placeholder="Telefono 1" value="{{$client->phone_number_1}}"/>
        </div>
        <div class="form-group mb-6">
            <x-ui.input-component label="Telefono - 2" type="phone" name="tel2" id="tel2"
                placeholder="Telefono 2" value="{{$client->phone_number_1}}"/>
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
</x-ui.card>
@endsection
