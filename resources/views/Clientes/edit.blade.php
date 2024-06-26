<!-- resources/views/clientes/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Cliente</div>

                    <div class="card-body">
                        <form action="{{ route('clientes.update', $cliente->ID_clientes) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Nom_cliente">Nombre</label>
                                <input type="text" class="form-control" id="Nom_cliente" name="Nom_cliente" value="{{ $cliente->Nom_cliente }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Ape_cliente">Apellido</label>
                                <input type="text" class="form-control" id="Ape_cliente" name="Ape_cliente" value="{{ $cliente->Ape_cliente }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Tipo_documento">Tipo Documento</label>
                                <input type="text" class="form-control" id="Tipo_documento" name="Tipo_documento" value="{{ $cliente->Tipo_documento }}" required>
                            </div>
                            <div class="form-group">
                                <label for="DNI_cliente">DNI</label>
                                <input type="text" class="form-control" id="DNI_cliente" name="DNI_cliente" value="{{ $cliente->DNI_cliente }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Cel_cliente">Celular</label>
                                <input type="text" class="form-control" id="Cel_cliente" name="Cel_cliente" value="{{ $cliente->Cel_cliente }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Correo_cliente">Correo Electrónico</label>
                                <input type="email" class="form-control" id="Correo_cliente" name="Correo_cliente" value="{{ $cliente->Correo_cliente }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
