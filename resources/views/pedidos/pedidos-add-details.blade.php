@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <x-ui.modal title="Agregar Producto" id="productModal">
            <div class="form-group">
                <form action="{{ route('pedidos.store.product', $cabeza->id) }}" method="POST">
                    @csrf
                    <input type="hidden" id="idProd" name="idProd">
                    <x-ui.input-component label="Cantidad" name="cantidad" id="cantidad" type="number" />
                    <x-ui.input-component label="Bonificadas" name="bonificadas" id="bonificadas" type="number" />
                    <br>
                    <button class="btn btn-success" type="submit">Enviar</button>
                </form>
            </div>
        </x-ui.modal>

        <x-ui.modal title="Productos Agregados" id="detailModal">
            <x-ui.table-component :headers="['ID', 'Producto', 'precio', 'Cantidad', 'Bonificadas', 'Eliminar']">
                @foreach ($detalles as $detalle)
                    <tr>
                        <td>{{ $detalle->id }}</td>
                        <td>{{ $detalle->product->name }}</td>
                        <td>Pendiente si se deja en tabla detalles o se lleva por relacion</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>{{ $detalle->bonificadas }}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </x-ui.table-component>
        </x-ui.modal>

        @if ($detalles->count() != 0)
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group" role="group" aria-label="Actions">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#detailModal">
                            <i class="bi bi-search"></i>
                        </button>
                        <button class="btn btn-primary">
                            <i class="bi bi-check"></i>
                        </button>
                    </div>
                </div>
            </div>
            <br>
        @endif
        <x-ui.table-component :headers="['ID', 'Producto', 'Principio Activo', 'precio', 'Agregar']">
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->active_principle }}</td>
                    @foreach ($product->prices as $price)
                        <td>${{ number_format($price->price) }}</td>
                    @endforeach
                    <td align="center">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#productModal"
                            onclick="id_prod({{ $product->id }})">
                            <i class="bi bi-plus-square"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </x-ui.table-component>


    </div>
    <script>
        function id_prod(id) {
            document.getElementById("idProd").value = id;
        }
    </script>
@endsection
