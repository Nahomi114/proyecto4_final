<!-- resources/views/proveedores/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Proveedor</div>

                    <div class="card-body">
                        <form action="{{ route('proveedores.update', $proveedor->ID_proveedores) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Nom_proveedores">Nombre</label>
                                <input type="text" class="form-control" id="Nom_proveedores" name="Nom_proveedores" value="{{ $proveedor->Nom_proveedores }}" required>
                            </div>
                            <div class="form-group">
                                <label for="RUC_proveedores">RUC</label>
                                <input type="text" class="form-control" id="RUC_proveedores" name="RUC_proveedores" value="{{ $proveedor->RUC_proveedores }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Telf_proveedores">Teléfono</label>
                                <input type="text" class="form-control" id="Telf_proveedores" name="Telf_proveedores" value="{{ $proveedor->Telf_proveedores }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Correo_proveedores">Correo Electrónico</label>
                                <input type="email" class="form-control" id="Correo_proveedores" name="Correo_proveedores" value="{{ $proveedor->Correo_proveedores }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
