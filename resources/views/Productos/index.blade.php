<!-- resources/views/productos/index.blade.php -->

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
                <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Producto</a>

                <table class="table-auto min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código de Barras</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $producto->ID_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $producto->categoria ? $producto->categoria->nombre : 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $producto->Cod_Barra_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $producto->Nom_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $producto->Precio_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $producto->Cantida_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($producto->Img_producto)
                                    <img src="{{ asset($producto->Img_producto) }}" class="w-16 h-16 object-cover rounded-full">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $producto->Stock_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $producto->Desc_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $producto->Estado_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('productos.edit', $producto) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro de eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
