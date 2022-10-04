<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

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
           {{$error}}
          </div>
        @endforeach
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Nuevo Cliente</h1><br>
                        <form action="{{route('send-cliente')}}" method="POST">
                        @csrf
                          <div class="form-group mb-6">
                            <label for="tipoCliente">Tipo Cliente</label>
                            <select class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" id="tipoCliente" name="tipoCliente" placeholder="Tipo">
                              <option selected>Selecciona una opcion</option>
                              <option value="1">Formulador</option>
                              <option value="2">Distribuidor</option>
                          </select>
                          </div>
                          <div class="form-group mb-6">
                            <input type="text" class="form-control block
                              w-full
                              px-3
                              py-1.5
                              text-base
                              font-normal
                              text-gray-700
                              bg-white bg-clip-padding
                              border border-solid border-gray-300
                              rounded
                              transition
                              ease-in-out
                              m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="NIT" name="NIT" value="{{old('NIT')}}"
                              placeholder="NIT">
                          </div>
                          <div class="form-group mb-6">
                            <input type="text" class="form-control block
                              w-full
                              px-3
                              py-1.5
                              text-base
                              font-normal
                              text-gray-700
                              bg-white bg-clip-padding
                              border border-solid border-gray-300
                              rounded
                              transition
                              ease-in-out
                              m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="nombre" name="nombre" value="{{old('nombre')}}"
                              placeholder="Nombre">
                          </div>
                          <div class="form-group mb-6">
                            <input type="email" class="form-control block
                              w-full
                              px-3
                              py-1.5
                              text-base
                              font-normal
                              text-gray-700
                              bg-white bg-clip-padding
                              border border-solid border-gray-300
                              rounded
                              transition
                              ease-in-out
                              m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="mail" name="mail" value="{{old('mail')}}"
                              placeholder="E-mail">
                          </div>
                          <div class="form-group mb-6">
                            <label for="tipoCliente">Ciudad</label>
                            <select class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" id="ciudad" name="ciudad" placeholder="Tipo">
                              <option selected>Selecciona una opcion</option>
                              <option value="1">Ciudad1</option>
                              <option value="2">ciudad2</option>
                          </select>
                          </div>
                          <div class="form-group mb-6">
                            <input type="text" class="form-control block
                              w-full
                              px-3
                              py-1.5
                              text-base
                              font-normal
                              text-gray-700
                              bg-white bg-clip-padding
                              border border-solid border-gray-300
                              rounded
                              transition
                              ease-in-out
                              m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="direccion" name="direccion" value="{{old('direccion')}}"
                              placeholder="Direccion">
                          </div>
                          <div class="form-group mb-6">
                            <input type="phone" class="form-control block
                              w-full
                              px-3
                              py-1.5
                              text-base
                              font-normal
                              text-gray-700
                              bg-white bg-clip-padding
                              border border-solid border-gray-300
                              rounded
                              transition
                              ease-in-out
                              m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="tel1" name="tel1" value="{{old('tel1')}}"
                              placeholder="Telefono 1">
                          </div>
                          <div class="form-group mb-6">
                            <input type="phone" class="form-control block
                              w-full
                              px-3
                              py-1.5
                              text-base
                              font-normal
                              text-gray-700
                              bg-white bg-clip-padding
                              border border-solid border-gray-300
                              rounded
                              transition
                              ease-in-out
                              m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="tel2" name="tel2" value="{{old('tel2')}}"
                              placeholder="Telefono 2">
                          </div>
                          <button type="submit" class="
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
                            ease-in-out">Send</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
