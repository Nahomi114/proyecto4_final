<!-- resources/views/detalle_ventas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold mb-4">Crear Detalle de Venta</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('detalle_ventas.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="ID_ventas">ID Venta</label>
                        <input type="number" name="ID_ventas" class="form-control" value="{{ old('ID_ventas') }}">
                    </div>

                    <div class="form-group">
                        <label for="ID_productos">Producto</label>
                        <select name="ID_productos" class="form-control">
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->ID_producto }}">{{ $producto->Nom_producto }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" value="{{ old('cantidad') }}">
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}">
                    </div>

                    <div class="form-group">
                        <label for="descuento">Descuento</label>
                        <input type="number" step="0.01" name="descuento" class="form-control" value="{{ old('descuento') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
