@extends('layouts.app')

@section('content')
@if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <a href="{{route('permissions.create')}}" class="btn btn-success btn-md">
                <i class="bi bi-folder-plus"></i>
            </a>
        </div>
    </div>
    <br>
    <x-ui.table-component :headers="['ID', 'Name']">
        @foreach ($permissions as $permission)
        <tr>
            <td>{{$permission->id}}</td>
            <td>{{$permission->name}}</td>
        </tr>
        @endforeach
    </x-ui.table-component>
    <div class="d-flex">
        {!! $permissions->links() !!}
    </div>
</div>
@endsection
