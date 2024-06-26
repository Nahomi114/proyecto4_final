<!-- resources/views/proveedores/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="card-header text-center" style="font-size: 2rem; font-weight: bold;">Lista de Proveedores</div>

                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Agregar Proveedor</a>
                        </div>

                        <table class="table-auto min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RUC</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefono</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo Electrónico</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($proveedores as $proveedor)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $proveedor->ID_proveedores }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $proveedor->Nom_proveedores }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $proveedor->RUC_proveedores }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $proveedor->Telf_proveedores }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $proveedor->Correo_proveedores }}</td>
                                        <td>
                                            <a href="{{ route('proveedores.edit', $proveedor->ID_proveedores) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('proveedores.destroy', $proveedor->ID_proveedores) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar este proveedor?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $proveedores->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

