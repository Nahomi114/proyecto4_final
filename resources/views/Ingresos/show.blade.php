<!-- resources/views/ingresos/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Ingreso {{ $ingreso->ID_ingreso }}</h1>

    <div class="card">
        <div class="card-header">
            Información del Ingreso
        </div>
        <div class="card-body">
            <p><strong>ID de Ingreso:</strong> {{ $ingreso->ID_ingreso }}</p>
            <p><strong>Proveedor:</strong> {{ $ingreso->proveedor ? $ingreso->proveedor->Nom_proveedores : 'N/A' }}</p>
            <p><strong>Usuario:</strong> {{ $ingreso->user ? $ingreso->user->name : 'N/A' }}</p>
            <p><strong>Tipo de Comprobante:</strong> {{ $ingreso->tipo_comprob }}</p>
            <p><strong>Serie de Comprobante:</strong> {{ $ingreso->serie_comprob }}</p>
            <p><strong>Número de Comprobante:</strong> {{ $ingreso->num_comprob }}</p>
            <p><strong>Fecha de Ingreso:</strong> {{ $ingreso->fec_ingreso }}</p>
            <p><strong>Impuesto:</strong> {{ $ingreso->impuesto }}</p>
            <p><strong>Total:</strong> {{ $ingreso->total }}</p>
        </div>
    </div>

    <hr>

    <h2>Agregar Detalle de Ingreso</h2>

    <form action="{{ route('detalle_ingreso.store') }}" method="POST">
        @csrf
        <input type="hidden" name="ID_ingreso" value="{{ $ingreso->ID_ingreso }}">
        <div class="form-group">
            <label for="ID_producto">Producto</label>
            <select name="ID_producto" class="form-control">
                @foreach ($productos as $producto)
                    <option value="{{ $producto->ID_producto }}">{{ $producto->Nom_producto }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cant_det_ingreso">Cantidad</label>
            <input type="number" name="cant_det_ingreso" class="form-control" value="{{ old('cant_det_ingreso') }}">
        </div>
        <div class="form-group">
            <label for="precio_det_ingreso">Precio Unitario</label>
            <input type="number" step="0.01" name="precio_det_ingreso" class="form-control" value="{{ old('precio_det_ingreso') }}">
        </div>
        <button type="submit" class="btn btn-primary">Agregar Detalle</button>
    </form>
</div>
@endsection
