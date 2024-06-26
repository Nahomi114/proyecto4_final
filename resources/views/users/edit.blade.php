<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuario</div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Nueva Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <small class="text-muted">Dejar vacío para mantener la contraseña actual.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
