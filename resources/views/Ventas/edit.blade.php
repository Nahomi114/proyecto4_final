<!-- resources/views/ventas/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Venta</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ventas.update', $venta) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ID_clientes">Cliente</label>
                <input type="number" name="ID_clientes" class="form-control" value="{{ $venta->ID_clientes }}">
            </div>
            <div class="form-group">
                <label for="user_id">Usuario</label>
                <input type="number" name="user_id" class="form-control" value="{{ $venta->user_id }}">
            </div>
            <div class="form-group">
                <label for="tipo_comprobante">Tipo de Comprobante</label>
                <input type="text" name="tipo_comprobante" class="form-control" value="{{ $venta->tipo_comprobante }}">
            </div>
            <div class="form-group">
                <label for="serie_comprobante">Serie de Comprobante</label>
                <input type="text" name="serie_comprobante" class="form-control" value="{{ $venta->serie_comprobante }}">
            </div>
            <div class="form-group">
                <label for="num_comprobante">Número de Comprobante</label>
                <input type="text" name="num_comprobante" class="form-control" value="{{ $venta->num_comprobante }}">
            </div>
            <div class="form-group">
                <label for="fecha_venta">Fecha de Venta</label>
                <input type="datetime-local" name="fecha_venta" class="form-control" value="{{ $venta->fecha_venta->format('Y-m-d\TH:i') }}">
            </div>
            <div class="form-group">
                <label for="impuesto_venta">Impuesto</label>
                <input type="number" step="0.01" name="impuesto_venta" class="form-control" value="{{ $venta->impuesto_venta }}">
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" step="0.01" name="total" class="form-control" value="{{ $venta->total }}">
            </div>
            <div class="form-group">
                <label for="Estado">Estado</label>
                <input type="text" name="Estado" class="form-control" value="{{ $venta->Estado }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection
