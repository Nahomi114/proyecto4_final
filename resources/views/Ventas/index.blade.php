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
                <div class="card-header text-center" style="font-size: 2rem; font-weight: bold;">Listado de Ventas</div>
                <a href="{{ route('ventas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Crear Nueva Venta</a>

                <div class="card-body">
                    <table class="w-full table-auto min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-3">ID Venta</th>
                                <th class="px-6 py-3">Cliente</th>
                                <th class="px-6 py-3">Usuario</th>
                                <th class="px-6 py-3">Fecha de Venta</th>
                                <th class="px-6 py-3">Total</th>
                                <th class="px-6 py-3">Estado</th>
                                <th class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($ventas as $venta)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $venta->ID_ventas }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $venta->cliente ? $venta->cliente->Nom_cliente : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $venta->usuario ? $venta->usuario->name : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $venta->fecha_venta ? \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $venta->total }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('ventas.update', $venta->ID_ventas) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn {{ $venta->Estado == 'Pagado' ? 'btn-success' : 'btn-warning' }}">
                                                {{ $venta->Estado }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('ventas.edit', $venta) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                        <form action="{{ route('ventas.destroy', $venta) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('¿Está seguro de eliminar esta venta?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $ventas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
