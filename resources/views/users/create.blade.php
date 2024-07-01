@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm max-w-md mx-auto dark:bg-muted dark:text-muted-foreground">
        <div class="flex flex-col space-y-1.5 p-6">
            <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl">Crear nuevo cliente</h3>
            <p class="text-sm text-muted-foreground">Ingresa los datos del nuevo cliente</p>
        </div>
        <div class="p-6 grid gap-4">
            <div class="grid grid-cols-2 gap-4">
                <div class="grid gap-2">
                    <label for="firstName" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-muted-foreground">
                        Nombre
                    </label>
                    <input type="text" id="firstName" placeholder="Ingresa el nombre"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                </div>
            </div>
            <div class="grid gap-2">
                <label for="email" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-muted-foreground">
                    Correo electrónico
                </label>
                <input type="email" id="email" placeholder="Ingresa el correo"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
            </div>
            <div class="grid gap-2">
                <label for="password" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-muted-foreground">
                    Contraseña
                </label>
                <input type="text" id="password" placeholder="Ingresa la contraseña"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
            </div>
            <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                        <a href="{{ route('proveedores.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">Cancelar</a>
                    </div>
        </div>
    </div>
</div>
@endsection
