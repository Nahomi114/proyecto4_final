@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm w-full max-w-md mx-auto dark:bg-muted dark:text-muted-foreground">
            <div class="flex flex-col space-y-1.5 p-6">
                <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl">Crear nueva categoría</h3>
                <p class="text-sm text-muted-foreground">Ingresa los datos de la nueva categoría</p>
            </div>
            <div class="p-6 grid gap-4">
                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="grid gap-2">
                            <label for="Nom_categorias"
                                   class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-muted-foreground">Nombre de la Categoría</label>
                            <input type="text" id="Nom_categorias" name="Nom_categorias"
                                   placeholder="Ingresa el nombre de la categoría"
                                   class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                   required maxlength="50">
                        </div>
                        <div class="grid gap-2">
                            <label for="Desc_categorias"
                                   class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-muted-foreground">Descripción de la Categoría</label>
                            <textarea id="Desc_categorias" name="Desc_categorias"
                                      placeholder="Ingresa la descripción de la categoría"
                                      class="flex h-20 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                      required maxlength="100"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                            class="mt-4 btn btn-primary">Guardar</button>
                    <a href="{{ route('categorias.index') }}"
                       class="mt-4 btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection


