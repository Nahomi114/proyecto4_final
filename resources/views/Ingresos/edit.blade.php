<!-- resources/views/ingresos/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ingreso</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ingresos.update', ['ingreso' => $ingreso->ID_ingreso]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ID_proveedores">Proveedor</label>
            <input type="number" name="ID_proveedores" class="form-control" value="{{ old('ID_proveedores', $ingreso->ID_proveedores) }}">
        </div>
        <div class="form-group">
            <label for="user_id">Usuario</label>
            <input type="number" name="user_id" class="form-control" value="{{ old('user_id', $ingreso->user_id) }}">
        </div>
        <div class="form-group">
            <label for="tipo_comprob">Tipo Comprobante</label>
            <input type="text" name="tipo_comprob" class="form-control" value="{{ old('tipo_comprob', $ingreso->tipo_comprob) }}">
        </div>
        <div class="form-group">
            <label for="serie_comprob">Serie Comprobante</label>
            <input type="text" name="serie_comprob" class="form-control" value="{{ old('serie_comprob', $ingreso->serie_comprob) }}">
        </div>
        <div class="form-group">
            <label for="num_comprob">Número Comprobante</label>
            <input type="text" name="num_comprob" class="form-control" value="{{ old('num_comprob', $ingreso->num_comprob) }}">
        </div>
        <div class="form-group">
            <label for="fec_ingreso">Fecha Ingreso</label>
            <input type="datetime-local" name="fec_ingreso" class="form-control" value="{{ old('fec_ingreso', \Carbon\Carbon::parse($ingreso->fec_ingreso)->format('Y-m-d\TH:i')) }}">
        </div>
        <div class="form-group">
            <label for="impuesto">Impuesto</label>
            <input type="number" step="0.01" name="impuesto" class="form-control" value="{{ old('impuesto', $ingreso->impuesto) }}">
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" step="0.01" name="total" class="form-control" value="{{ old('total', $ingreso->total) }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
