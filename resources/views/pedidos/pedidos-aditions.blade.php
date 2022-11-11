@extends('layouts.app')

@section('content')
    <div class="container">
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
        <br>
        <x-ui.modal title="Agregar Producto" id="addProductModal">
            <div class="form-group">
                <form action="{{ route('pedidos.store.product', $pedido->id) }}" method="POST">
                    @csrf
                    <input type="hidden" id="idProd" name="idProd">
                    <x-ui.input-component label="Cantidad" name="cantidad" id="cantidad" type="number" />
                    <x-ui.input-component label="Bonificadas" name="bonificadas" id="bonificadas" type="number" />
                    <br>
                    <button class="btn btn-success" type="submit">Enviar</button>
                </form>
            </div>
        </x-ui.modal>

        <x-ui.modal title="Productos Agregados" id="productModal">
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
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#addProductModal" onclick="id_prod({{ $product->id }})">
                                <i class="bi bi-plus-square"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-ui.table-component>
        </x-ui.modal>

        <x-ui.card title="Pedido N°{{ $pedido->id }}">
            <div class="row">
                <div class="col-sm-6">
                    <label><strong>Cliente:</strong></label>
                    <p>{{ $pedido->client->name }}</p>
                    <br>
                    <label><strong>Estado:</strong></label>
                    <p>{{ $pedido->estado }}</p>
                </div>
                <div class="col-sm-6">
                    <label><strong>NIT:</strong></label>
                    <p>{{ $pedido->client->nit }}</p>
                </div>
            </div>
        </x-ui.card>

        <x-ui.card title="Adicionales Pedido">
            <form action="{{route('pedidos.aditions.store',$pedido->id)}}" enctype="multipart/form-data" method="POST">
            <div class="row">
                    @csrf
                    <div class="col-sm-6">
                        <label for="fechaEntrega" class="form-label">Fecha Entrega</label>
                        <input type="date" name="fechaEntrega" id="fechaEntrega" class="form-control" value="{{$pedido->fecha_entrega}}">
                        <br>
                        <label for="ordenCompra" class="form-label">Orden Compra</label>
                        <input type="text" name="ordenCompra" id="ordenCompra" class="form-control" value="{{$pedido->orden_compra}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="fechaOrden" class="form-label">Fecha Orden Compra</label>
                        <input type="date" name="fechaOrden" id="fechaOrden" class="form-control" value="{{$pedido->fecha_orden}}">
                        <br>
                        @if ($pedido->adjunto)
                        <label for="">ver Adjunto</label>
                            <a href="{{ Storage::disk('pedidos')->path($pedido->adjunto) }}" target="_blank">
                                <img src="{{asset('images/file.png')}}" width="50" height="50">
                            </a>
                        @endif
                        <br>
                        <label for="adjuntoOrden" class="form-label">Adjunto Orden Compra</label>
                        <input type="file" name="adjuntoOrden" id="adjuntoOrden" class="form-control">
                    </div>
            </div>
                    <label for="observacion" class="form-label">Observaciones</label>
                    <textarea name="observacion" id="observacion" class="form-control">{{$pedido->observacion}}</textarea>

                    <br>
                    <button class="btn btn-success">Enviar Pedido</button>
            </form>
        </x-ui.card>
        <br>
        <section class="shoping-cart">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#productModal">
                <i class="bi bi-cart"></i>
            </button>
        </section>
        <br>
        <div class="table-responsive">
            <x-ui.table-component :headers="['ID', 'Producto', 'precio', 'Cantidad', 'Bonificadas', 'Eliminar']">
                @foreach ($pedido->detalles()->get() as $detalle)
                    <tr>
                        <td>{{ $detalle->id }}</td>
                        <td>{{ $detalle->product->name }}</td>
                        <td>${{ number_format($detalle->precio) }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>{{ $detalle->bonificadas }}</td>
                        <td>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['pedidos.destroy', $detalle->id],
                                'style' => 'display:inline',
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </x-ui.table-component>
        </div>


    </div>

    <script>
        function id_prod(id) {
            document.getElementById("idProd").value = id;
        }
    </script>
@endsection
