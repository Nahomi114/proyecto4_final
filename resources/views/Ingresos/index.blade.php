<!-- resources/views/ingresos/index.blade.php -->

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
                <a href="{{ route('ingresos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Ingreso</a> 
                <a href="{{ route('detalle_ingreso.index') }}" class="btn btn-primary mb-3 ml-3">Detalles ingresos</a>
                <table class="table-auto min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proveedor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo Comprobante</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Impuesto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($ingresos as $ingreso)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->ID_ingreso }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->proveedor ? $ingreso->proveedor->nombre : 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->user ? $ingreso->user->name : 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->tipo_comprob }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->serie_comprob }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->num_comprob }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->fec_ingreso }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->impuesto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $ingreso->total }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('ingresos.edit', $ingreso) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                
                                <form action="{{ route('ingresos.destroy', $ingreso) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro de eliminar este ingreso?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="mt-4">
                    {{ $ingresos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
