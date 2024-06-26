<!-- resources/views/productos/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.update', ['producto' => $producto->ID_producto]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ID_categorias">Categoría</label>
            <input type="number" name="ID_categorias" class="form-control" value="{{ old('ID_categorias', $producto->ID_categorias) }}">
        </div>
        <div class="form-group">
            <label for="Cod_Barra_producto">Código de Barras</label>
            <input type="text" name="Cod_Barra_producto" class="form-control" value="{{ old('Cod_Barra_producto', $producto->Cod_Barra_producto) }}">
        </div>
        <div class="form-group">
            <label for="Nom_producto">Nombre</label>
            <input type="text" name="Nom_producto" class="form-control" value="{{ old('Nom_producto', $producto->Nom_producto) }}">
        </div>
        <div class="form-group">
            <label for="Precio_producto">Precio</label>
            <input type="number" step="0.01" name="Precio_producto" class="form-control" value="{{ old('Precio_producto', $producto->Precio_producto) }}">
        </div>
        <div class="form-group">
            <label for="Cantida_producto">Cantidad</label>
            <input type="number" name="Cantida_producto" class="form-control" value="{{ old('Cantida_producto', $producto->Cantida_producto) }}">
        </div>
        <div class="form-group">
            <label for="Img_producto">Imagen</label>
            <input type="text" name="Img_producto" class="form-control" value="{{ old('Img_producto', $producto->Img_producto) }}">
        </div>
        <div class="form-group">
            <label for="Stock_producto">Stock</label>
            <input type="number" name="Stock_producto" class="form-control" value="{{ old('Stock_producto', $producto->Stock_producto) }}">
        </div>
        <div class="form-group">
            <label for="Desc_producto">Descripción</label>
            <input type="text" name="Desc_producto" class="form-control" value="{{ old('Desc_producto', $producto->Desc_producto) }}">
        </div>
        <div class="form-group">
            <label for="Estado_producto">Estado</label>
            <input type="text" name="Estado_producto" class="form-control" value="{{ old('Estado_producto', $producto->Estado_producto) }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
