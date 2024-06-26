<!-- resources/views/ventas/index.blade.php -->

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
                <a href="{{ route('ventas.create') }}" class="btn btn-primary mb-3">Crear Nueva Venta</a>
                <a href="{{ route('detalle_ventas.index') }}" class="btn btn-primary mb-3 ml-3">Detalles Ventas</a>
                <table class="table-auto min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de Comprobante</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serie de Comprobante</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número de Comprobante</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Venta</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Impuesto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($ventas as $venta)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->ID_ventas }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->cliente ? $venta->cliente->nombre : 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->usuario ? $venta->usuario->name : 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->tipo_comprobante }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->serie_comprobante }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->num_comprobante }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->fecha_venta->format('d/m/Y H:i:s') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->impuesto_venta }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->total }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $venta->Estado }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('ventas.edit', $venta) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                
                                <form action="{{ route('ventas.destroy', $venta) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro de eliminar esta venta?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $ventas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
