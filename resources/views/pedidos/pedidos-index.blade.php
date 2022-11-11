@extends('layouts.app')

@section('content')
<div class="container">

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('pedidos.create')}}" class="btn btn-success btn-md">
                <i class="bi bi-plus-square"></i>
            </a>
        </div>
    </div>
    <br>
    <x-ui.table-component :headers="['ID', 'Estado', 'NIT', 'Establecimiento','Acciones']">
        @foreach ($data as $pedido)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->estado}}</td>
                <td>{{$pedido->client->nit}}</td>
                <td>{{$pedido->client->name}}</td>
                <td>
                    <center>
                        <a class="btn btn-primary" href="{{ route('pedidos.edit',$pedido->id) }}">Edit</a>
                    </center>
                </td>
            </tr>
        @endforeach
        <div class="d-flex">
            {!! $data->links() !!}
        </div>
    </x-ui.table-component>

</div>
@endsection
