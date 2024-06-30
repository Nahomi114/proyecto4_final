<!-- resources/views/ingresos/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Ingreso</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ingresos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ID_ingreso">Seleccionar ID de Ingreso</label>
            <select name="ID_ingreso" class="form-control">
                @foreach ($ingresos as $ingreso)
                    <option value="{{ $ingreso->ID_ingreso }}">{{ $ingreso->ID_ingreso }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Seleccionar</button>
    </form>
</div>
@endsection

