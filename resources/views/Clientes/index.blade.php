@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center" style="font-size: 2rem; font-weight: bold;">Listado de Clientes</div>
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right">Nuevo Cliente</a>
                        </div>

                        <div class="card-body">
                            <div class="bg-background text-card-foreground rounded-lg shadow-lg">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-primary text-primary-foreground font-medium">
                                            <th class="px-4 py-3 rounded-tl-lg">ID</th>
                                            <th class="px-4 py-3">Nombre</th>
                                            <th class="px-4 py-3">Apellido</th>
                                            <th class="px-4 py-3">Tipo Documento</th>
                                            <th class="px-4 py-3">Número de Documento</th>
                                            <th class="px-4 py-3">Celular</th>
                                            <th class="px-4 py-3">Correo Electrónico</th>
                                            <th class="px-4 py-3 rounded-tr-lg">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clientes as $cliente)
                                            <tr class="border-b hover:bg-muted">
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->ID_clientes }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Nom_cliente }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Ape_cliente }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Tipo_documento }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->DNI_cliente }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Cel_cliente }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Correo_cliente }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">
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
                            </div>

                            {{ $clientes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

