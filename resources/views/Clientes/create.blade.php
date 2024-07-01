@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white dark:bg-muted dark:text-muted-foreground shadow-md rounded-lg overflow-hidden">
                    <div class="bg-blue-900 text-white px-6 py-4">
                        <h2 class="text-2xl font-semibold">Crear Cliente</h2>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('clientes.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="Nom_cliente" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Nombre</label>
                                <input type="text" id="Nom_cliente" name="Nom_cliente" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('Nom_cliente') border-red-500 @enderror" value="{{ old('Nom_cliente') }}" required>
                                @error('Nom_cliente')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="Ape_cliente" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Apellido</label>
                                <input type="text" id="Ape_cliente" name="Ape_cliente" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('Ape_cliente') border-red-500 @enderror" value="{{ old('Ape_cliente') }}" required>
                                @error('Ape_cliente')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="Tipo_documento" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Tipo Documento</label>
                                <select id="Tipo_documento" name="Tipo_documento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('Tipo_documento') border-red-500 @enderror" required>
                                    <option value="">Seleccionar tipo de documento</option>
                                    <option value="DNI" @if(old('Tipo_documento') == 'DNI') selected @endif>DNI</option>
                                    <option value="RUC" @if(old('Tipo_documento') == 'RUC') selected @endif>RUC</option>
                                    <option value="Pasaporte" @if(old('Tipo_documento') == 'Pasaporte') selected @endif>Pasaporte</option>
                                </select>
                                @error('Tipo_documento')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="DNI_cliente" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Número de Documento</label>
                                <input type="text" id="DNI_cliente" name="DNI_cliente" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('DNI_cliente') border-red-500 @enderror" value="{{ old('DNI_cliente') }}" pattern="\d*" required>
                                @error('DNI_cliente')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="Cel_cliente" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Celular</label>
                                <input type="text" id="Cel_cliente" name="Cel_cliente" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('Cel_cliente') border-red-500 @enderror" value="{{ old('Cel_cliente') }}" pattern="\d*" maxlength="9" required>
                                @error('Cel_cliente')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="Correo_cliente" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Correo Electrónico</label>
                                <input type="email" id="Correo_cliente" name="Correo_cliente" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('Correo_cliente') border-red-500 @enderror" value="{{ old('Correo_cliente') }}" required>
                                @error('Correo_cliente')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex justify-end mt-6">
                                <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Guardar</button>
                                <a href="{{ route('clientes.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
