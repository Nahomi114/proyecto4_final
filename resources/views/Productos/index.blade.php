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

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                    @foreach ($productos as $producto)
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="p-4">
                                <img src="{{ asset($producto->Img_producto) }}" alt="{{ $producto->Nom_producto }}" class="w-full h-auto mb-4">
                                <div class="text-lg font-semibold">{{ $producto->Nom_producto }}</div>
                                <div class="text-gray-600 mb-2">S/.{{ $producto->Precio_producto }}</div>
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('productos.edit', $producto) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro de eliminar este producto?')">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

