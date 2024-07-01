@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    <div class="card">
                        <div class="card-header text-center text-2xl font-bold">Lista de Proveedores</div>

                        <div class="p-6">
                            <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Agregar Proveedor</a>
                        </div>

                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="bg-background text-card-foreground rounded-lg shadow-lg">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-primary text-primary-foreground font-medium">
                                            <th class="px-4 py-3">ID</th>
                                            <th class="px-4 py-3">Nombre</th>
                                            <th class="px-4 py-3">RUC</th>
                                            <th class="px-4 py-3">Teléfono</th>
                                            <th class="px-4 py-3">Correo Electrónico</th>
                                            <th class="px-4 py-3">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proveedores as $proveedor)
                                            <tr class="border-b hover:bg-muted">
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->ID_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->Nom_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->RUC_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->Telf_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->Correo_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">
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
                            </div>
                            {{ $proveedores->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

