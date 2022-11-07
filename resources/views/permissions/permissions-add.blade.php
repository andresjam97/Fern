@extends('layouts.app')

@section('content')
    <div class="container">
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
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <strong>Exito!</strong> {!! \Session::get('success') !!}<br><br>
            </div>
        @endif
        <h1>{{ __('Add Permissions.') }}</h1>
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <x-ui.input-component label="Permiso" name="permission" id="permission" type="text" />
            </div>
            <br>
            <button type="submit" class="btn btn-success">{{ __('Send') }}</button>
        </form>
    </div>
@endsection
