<!-- resources/views/categorias/index.blade.php -->

@extends('layouts.app')

@section('content')
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Crear Nueva Categoría</a>

                <table class="table-auto min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->Nom_categorias }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->Desc_categorias }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('categorias.edit', $categoria) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
            
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro de eliminar esta categoría?')">Eliminar</button>
                    </form>
                </td>
                </tr>
                    @endforeach

                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $categorias->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection




