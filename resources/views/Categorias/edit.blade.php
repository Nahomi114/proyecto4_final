<!-- resources/views/categorias/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="Nom_categorias" class="block text-sm font-medium text-gray-700">Nombre de la categoría</label>
                        <input type="text" name="Nom_categorias" id="Nom_categorias" value="{{ old('Nom_categorias', $categoria->Nom_categorias) }}" class="form-input mt-1 block w-full">
                        @error('Nom_categorias')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Desc_categorias" class="block text-sm font-medium text-gray-700">Descripción de la categoría</label>
                        <textarea name="Desc_categorias" id="Desc_categorias" class="form-textarea mt-1 block w-full" rows="3">{{ old('Desc_categorias', $categoria->Desc_categorias) }}</textarea>
                        @error('Desc_categorias')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


