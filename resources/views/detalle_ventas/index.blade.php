<!-- resources/views/detalle_ventas/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('detalle_ventas.create') }}" class="btn btn-primary mb-3">Agregar Detalle de Venta</a>

                <table class="table-auto min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Venta</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descuento</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($detallesVenta as $detalleVenta)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detalleVenta->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detalleVenta->ID_ventas }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detalleVenta->producto ? $detalleVenta->producto->Nom_producto : 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detalleVenta->cantidad }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detalleVenta->precio }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $detalleVenta->descuento }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('detalle_ventas.edit', $detalleVenta) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    
                                    <form action="{{ route('detalle_ventas.destroy', $detalleVenta) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro de eliminar este detalle de venta?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $detallesVenta->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
