@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Crear Nuevo Producto</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg">
            @csrf
            <div class="mb-4">
                <label for="ID_categorias" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="ID_categorias" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->ID_categorias }}">{{ $categoria->Nom_categorias }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="Cod_Barra_producto" class="block text-sm font-medium text-gray-700">Código de Barras</label>
                <input type="text" name="Cod_Barra_producto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('Cod_Barra_producto') }}">
            </div>
            <div class="mb-4">
                <label for="Nom_producto" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="Nom_producto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('Nom_producto') }}">
            </div>
            <div class="mb-4">
                <label for="Precio_producto" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" step="0.01" name="Precio_producto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('Precio_producto') }}">
            </div>
            <div class="mb-4">
                <label for="Cantida_producto" class="block text-sm font-medium text-gray-700">Cantidad</label>
                <input type="number" name="Cantida_producto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('Cantida_producto') }}">
            </div>
            <div class="mb-4">
                <label for="Img_producto" class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="file" name="Img_producto" class="mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="Stock_producto" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="Stock_producto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('Stock_producto') }}">
            </div>
            <div class="mb-4">
                <label for="Desc_producto" class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" name="Desc_producto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('Desc_producto') }}">
            </div>
            <div class="mb-4">
                <label for="Estado_producto" class="block text-sm font-medium text-gray-700">Estado</label>
                <input type="text" name="Estado_producto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('Estado_producto') }}">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Guardar</button>
            </div>
        </form>
    </div>
@endsection
