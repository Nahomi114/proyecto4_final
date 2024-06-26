<!-- resources/views/ventas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Venta</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ventas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ID_clientes">Cliente</label>
                <input type="number" name="ID_clientes" class="form-control" value="{{ old('ID_clientes') }}">
            </div>
            <div class="form-group">
                <label for="user_id">Usuario</label>
                <input type="number" name="user_id" class="form-control" value="{{ old('user_id', Auth::id()) }}">
            </div>
            <div class="form-group">
                <label for="tipo_comprobante">Tipo de Comprobante</label>
                <input type="text" name="tipo_comprobante" class="form-control" value="{{ old('tipo_comprobante') }}">
            </div>
            <div class="form-group">
                <label for="serie_comprobante">Serie de Comprobante</label>
                <input type="text" name="serie_comprobante" class="form-control" value="{{ old('serie_comprobante') }}">
            </div>
            <div class="form-group">
                <label for="num_comprobante">Número de Comprobante</label>
                <input type="text" name="num_comprobante" class="form-control" value="{{ old('num_comprobante') }}">
            </div>
            <div class="form-group">
                <label for="fecha_venta">Fecha de Venta</label>
                <input type="datetime-local" name="fecha_venta" class="form-control" value="{{ old('fecha_venta') }}">
            </div>
            <div class="form-group">
                <label for="impuesto_venta">Impuesto</label>
                <input type="number" step="0.01" name="impuesto_venta" class="form-control" value="{{ old('impuesto_venta') }}">
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" step="0.01" name="total" class="form-control" value="{{ old('total') }}">
            </div>
            <div class="form-group">
                <label for="Estado">Estado</label>
                <input type="text" name="Estado" class="form-control" value="{{ old('Estado', 'Activo') }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
