<!-- resources/views/clientes/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center" style="font-size: 2rem; font-weight: bold;">Listado de Clientes</div>
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right">Nuevo Usuario</a>
                        </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo Documento</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número de Documento</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Celular</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo Electrónico</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->ID_clientes }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->Nom_cliente }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->Ape_cliente }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->Tipo_documento }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->DNI_cliente }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->Cel_cliente }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $cliente->Correo_cliente }}</td>
                                        <td>
                                            <a href="{{ route('clientes.edit', $cliente->ID_clientes) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('clientes.destroy', $cliente->ID_clientes) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>

                        {{ $clientes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
