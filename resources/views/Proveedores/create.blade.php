@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="max-w-md mx-auto bg-card text-card-foreground shadow-sm rounded-lg border p-6 dark:bg-muted dark:text-muted-foreground">
            <div class="flex flex-col space-y-1.5">
                <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl">Crear nuevo cliente</h3>
                <p class="text-sm text-muted-foreground">Ingresa los datos del nuevo cliente</p>
            </div>
            <div class="grid gap-4 mt-4">
                <form action="{{ route('proveedores.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="grid gap-2">
                            <label for="firstName" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-muted-foreground">Nombre</label>
                            <input type="text" id="firstName" name="Nom_proveedores" placeholder="Ingresa el nombre" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required>
                        </div>
                        <div class="grid gap-2">
                            <label for="lastName" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-muted-foreground">RUC</label>
                            <input type="text" id="lastName" name="RUC_proveedores" placeholder="Ingresa el RUC" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required>
                        </div>
                    </div>

                    <div class="grid gap-2 mt-4">
                        <label for="phone" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-muted-foreground">Teléfono</label>
                        <input type="text" id="phone" name="Telf_proveedores" placeholder="Ingresa el teléfono" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required>
                    </div>
                    <div class="grid gap-2 mt-4">
                        <label for="email" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-muted-foreground">Correo electrónico</label>
                        <input type="email" id="email" name="Correo_proveedores" placeholder="Ingresa el correo" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" required>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                        <a href="{{ route('proveedores.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
