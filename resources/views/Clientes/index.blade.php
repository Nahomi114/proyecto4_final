<!-- resources/views/clientes/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Listado de Clientes</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Tipo Documento</th>
                                    <th>Número de Documento</th>
                                    <th>Celular</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->ID_clientes }}</td>
                                        <td>{{ $cliente->Nom_cliente }}</td>
                                        <td>{{ $cliente->Ape_cliente }}</td>
                                        <td>{{ $cliente->Tipo_documento }}</td>
                                        <td>{{ $cliente->DNI_cliente }}</td>
                                        <td>{{ $cliente->Cel_cliente }}</td>
                                        <td>{{ $cliente->Correo_cliente }}</td>
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
