<!-- resources/views/detalle_ingreso/index.blade.php -->

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
                <a href="{{ route('detalle_ingreso.create') }}" class="btn btn-primary mb-3">Crear Nuevo Detalle de Ingreso</a>

                <table class="table-auto min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Producto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Ingreso</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($detallesIngreso as $detalle)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $detalle->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $detalle->ID_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $detalle->ID_ingreso }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $detalle->cant_det_ingreso }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $detalle->precio_det_ingreso }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('detalle_ingreso.edit', $detalle) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                
                                <form action="{{ route('detalle_ingreso.destroy', $detalle) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro de eliminar este detalle de ingreso?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $detallesIngreso->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
