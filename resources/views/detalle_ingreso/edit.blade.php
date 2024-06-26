<!-- resources/views/detalle_ingreso/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Detalle de Ingreso</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('detalle_ingreso.update', $detalleIngreso) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ID_producto">Producto</label>
                <input type="number" name="ID_producto" class="form-control" value="{{ $detalleIngreso->ID_producto }}">
            </div>
            <div class="form-group">
                <label for="ID_ingreso">ID de Ingreso</label>
                <input type="number" name="ID_ingreso" class="form-control" value="{{ $detalleIngreso->ID_ingreso }}">
            </div>
            <div class="form-group">
                <label for="cant_det_ingreso">Cantidad</label>
                <input type="number" name="cant_det_ingreso" class="form-control" value="{{ $detalleIngreso->cant_det_ingreso }}">
            </div>
            <div class="form-group">
                <label for="precio_det_ingreso">Precio</label>
                <input type="number" step="0.01" name="precio_det_ingreso" class="form-control" value="{{ $detalleIngreso->precio_det_ingreso }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection
