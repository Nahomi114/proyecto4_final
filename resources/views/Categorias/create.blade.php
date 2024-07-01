@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="rounded-lg border bg-white dark:bg-muted dark:text-muted-foreground shadow-sm w-full max-w-md mx-auto">
            <div class="flex flex-col space-y-1.5 p-6 bg-blue-900 text-white">
                <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl">Crear nueva categoría</h3>
                <p class="text-sm">Ingresa los datos de la nueva categoría</p>
            </div>
            <div class="p-6">
                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="Nom_categorias" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Nombre de la Categoría</label>
                            <input type="text" id="Nom_categorias" name="Nom_categorias" placeholder="Ingresa el nombre de la categoría"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('Nom_categorias') border-red-500 @enderror"
                                   required maxlength="50">
                            @error('Nom_categorias')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="Desc_categorias" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Descripción de la Categoría</label>
                            <textarea id="Desc_categorias" name="Desc_categorias" placeholder="Ingresa la descripción de la categoría"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('Desc_categorias') border-red-500 @enderror"
                                      required maxlength="100"></textarea>
                            @error('Desc_categorias')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Guardar</button>
                        <a href="{{ route('categorias.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
