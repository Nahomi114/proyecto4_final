@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    <div class="card">
                        <div class="card-header text-center text-2xl font-bold">Lista de Proveedores</div>

                        <div class="p-6">
                            <a href="{{ route('proveedores.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Agregar Proveedor</a>
                        </div>

                        <div class="card-body">
                            <div class="bg-background text-card-foreground rounded-lg shadow-lg">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-primary text-primary-foreground font-medium">
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RUC</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo Electrónico</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proveedores as $proveedor)
                                            <tr class="hover:bg-gray-100">
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->ID_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->Nom_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->RUC_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->Telf_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->Correo_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <a href="{{ route('proveedores.edit', $proveedor->ID_proveedores) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                                    <form action="{{ route('proveedores.destroy', $proveedor->ID_proveedores) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('¿Está seguro de eliminar este proveedor?')">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $proveedores->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

