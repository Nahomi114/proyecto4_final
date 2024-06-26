<!-- resources/views/proveedores/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Proveedor</div>

                    <div class="card-body">
                        <form action="{{ route('proveedores.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Nom_proveedores">Nombre</label>
                                <input type="text" class="form-control" id="Nom_proveedores" name="Nom_proveedores" required>
                            </div>
                            <div class="form-group">
                                <label for="RUC_proveedores">RUC</label>
                                <input type="text" class="form-control" id="RUC_proveedores" name="RUC_proveedores" required>
                            </div>
                            <div class="form-group">
                                <label for="Telf_proveedores">Teléfono</label>
                                <input type="text" class="form-control" id="Telf_proveedores" name="Telf_proveedores" required>
                            </div>
                            <div class="form-group">
                                <label for="Correo_proveedores">Correo Electrónico</label>
                                <input type="email" class="form-control" id="Correo_proveedores" name="Correo_proveedores" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
