<!-- resources/views/clientes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Cliente</div>

                    <div class="card-body">
                        <form action="{{ route('clientes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Nom_cliente">Nombre</label>
                                <input type="text" class="form-control @error('Nom_cliente') is-invalid @enderror" id="Nom_cliente" name="Nom_cliente" value="{{ old('Nom_cliente') }}" required>
                                @error('Nom_cliente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Ape_cliente">Apellido</label>
                                <input type="text" class="form-control @error('Ape_cliente') is-invalid @enderror" id="Ape_cliente" name="Ape_cliente" value="{{ old('Ape_cliente') }}" required>
                                @error('Ape_cliente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Tipo_documento">Tipo Documento</label>
                                <input type="text" class="form-control @error('Tipo_documento') is-invalid @enderror" id="Tipo_documento" name="Tipo_documento" value="{{ old('Tipo_documento') }}" required>
                                @error('Tipo_documento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="DNI_cliente">DNI</label>
                                <input type="text" class="form-control @error('DNI_cliente') is-invalid @enderror" id="DNI_cliente" name="DNI_cliente" value="{{ old('DNI_cliente') }}" required>
                                @error('DNI_cliente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Cel_cliente">Celular</label>
                                <input type="text" class="form-control @error('Cel_cliente') is-invalid @enderror" id="Cel_cliente" name="Cel_cliente" value="{{ old('Cel_cliente') }}" required>
                                @error('Cel_cliente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Correo_cliente">Correo Electrónico</label>
                                <input type="email" class="form-control @error('Correo_cliente') is-invalid @enderror" id="Correo_cliente" name="Correo_cliente" value="{{ old('Correo_cliente') }}" required>
                                @error('Correo_cliente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

