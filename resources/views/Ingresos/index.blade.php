@extends('layouts.app')

@section('content')
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="card-header text-center text-2xl font-bold">Ingresos</div>
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('ingresos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Crear Nuevo Ingreso</a>
                <a href="{{ route('ingresos.pdf') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-md text-sm">PDF</a>    
            </div>

                <div class="card-body">
                    <table class="min-w-full table-auto">
                        <thead >
                            <tr class="bg-gray-200">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proveedor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Impuesto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($ingresos as $ingreso)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->ID_ingreso }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->proveedor ? $ingreso->proveedor->Nom_proveedores : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->user ? $ingreso->user->name : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->fec_ingreso }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->impuesto }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->total }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('ingresos.edit', $ingreso) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                        <a href="{{ route('detalle_ingreso.create', ['ingreso_id' => $ingreso->ID_ingreso]) }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Agregar Detalles</a>
                                        <a href="{{ route('detalle_ingreso.index', ['ingreso_id' => $ingreso->ID_ingreso]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Ver Detalles</a>
                                        <form action="{{ route('ingresos.destroy', $ingreso) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('¿Está seguro de eliminar este ingreso?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $ingresos->links() }}
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
