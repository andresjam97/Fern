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
                    @if (\Session::has('success'))
                        <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <h1>Edit Cliente</h1>
                    <br>
                    <section>

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
                        <button type="submit"
                            class="
                            w-full
                            px-6
                            py-2.5
                            bg-blue-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-blue-700 hover:shadow-lg
                            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-blue-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out">Enviar</button>
                    </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
