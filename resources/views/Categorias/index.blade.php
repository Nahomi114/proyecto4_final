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
                <div class="card-header text-center text-2xl font-bold">Listado de Categorías</div>
                <div class="flex justify-end">
                    <a href="{{ route('categorias.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md mr-2 text-sm">Nueva Categoría</a>
                    <a href="{{ route('categorias.pdf') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-md text-sm">PDF</a>
                </div>
            </div>
            <form action="{{ route('categorias.search') }}" method="GET" class="p-6 bg-white border-b border-gray-200">
                <input type="text" name="search_key" placeholder="Buscar por nombre de categoría" class="px-4 py-2 border border-gray-300 rounded-md">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md ml-2">Buscar</button>
            </form>
            
            @if (session('result'))
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Resultados de la búsqueda:</h2>
                    <p>{{ session('result')->Nom_categorias }}</p>
                    <p>{{ session('result')->Desc_categorias }}</p>
                </div>
            @endif

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->ID_categorias }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->Nom_categorias }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->Desc_categorias }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('categorias.edit', $categoria->ID_categorias) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                <form action="{{ route('categorias.destroy', $categoria->ID_categorias) }}" method="POST" style="display: inline;">
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
@endsection
