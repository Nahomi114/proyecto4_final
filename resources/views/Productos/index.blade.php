@extends('layouts.app')

@section('content')
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <div class="card-body">
        <div class="p-6 bg-white border-b border-gray-200">
            <a href="{{ route('productos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Crear Nuevo Producto</a>
            
            <!-- Formulario de búsqueda -->
            <form action="{{ route('productos.search') }}" method="GET" class="mt-4">
                <input type="text" name="search_key" placeholder="Buscar por nombre de producto" class="px-4 py-2 border border-gray-300 rounded-md">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md ml-2">Buscar</button>
            </form>

            <!-- Resultados de búsqueda -->
            @if (session('result'))
                <div class="mt-4">
                    <h2>Resultado de la búsqueda:</h2>
                    <div class="relative overflow-hidden rounded-lg shadow-lg group hover:shadow-xl hover:-translate-y-2">
                        <a href="{{ route('productos.edit', session('result')) }}" class="absolute inset-0 z-10" rel="ugc">
                            <span class="sr-only">Ver</span>
                        </a>
                        <img src="{{ asset(session('result')->Img_producto) }}" alt="{{ session('result')->Nom_producto }}" class="object-cover w-full h-64">
                        <div class="p-4 bg-background">
                            <h3 class="text-lg font-semibold">{{ session('result')->Nom_producto }}</h3>
                            <div class="text-sm text-muted-foreground">S/.{{ session('result')->Precio_producto }}</div>
                            <div class="flex items-center justify-between mt-4">
                                <a href="{{ route('productos.edit', session('result')) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                <form action="{{ route('productos.destroy', session('result')) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro de eliminar este producto?')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (session('error'))
                <div class="mt-4">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

        </div>
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach ($productos as $producto)
                <div class="relative overflow-hidden rounded-lg shadow-lg group hover:shadow-xl hover:-translate-y-2">
                    <a href="{{ route('productos.edit', $producto) }}" class="absolute inset-0 z-10" rel="ugc">
                        <span class="sr-only">Ver</span>
                    </a>
                    <img src="{{ asset($producto->Img_producto) }}" alt="{{ $producto->Nom_producto }}" class="object-cover w-full h-64">
                    <div class="p-4 bg-background">
                        <h3 class="text-lg font-semibold">{{ $producto->Nom_producto }}</h3>
                        <div class="text-sm text-muted-foreground">S/.{{ $producto->Precio_producto }}</div>
                        <div class="flex items-center justify-between mt-4">
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
        </section>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $productos->links() }}
        </div>
    </div>
@endsection
