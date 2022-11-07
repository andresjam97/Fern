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
        <br>
        <x-ui.table-component :headers="['ID', 'NIT', 'Establecimiento', 'Seleccionar']">
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->nit }}</td>
                    <td>{{ $client->name }}</td>
                    <td align="center">
                        <a href="{{route('pedidos.store',$client->id)}}" class="btn btn-success btn-sm">
                            <i class="bi bi-plus-square"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </x-ui.table-component>
        <div class="d-flex">
            {!! $clients->links() !!}
        </div>
    </div>
@endsection
