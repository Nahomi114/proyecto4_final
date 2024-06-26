<!-- resources/views/categorias/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nueva Categoría</h2>

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Nom_categorias">Nombre de la Categoría:</label>
                <input type="text" class="form-control" id="Nom_categorias" name="Nom_categorias" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="Desc_categorias">Descripción de la Categoría:</label>
                <textarea class="form-control" id="Desc_categorias" name="Desc_categorias" required maxlength="100"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection


