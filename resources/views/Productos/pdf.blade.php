<!-- resources/views/categorias/pdf.blade.php -->
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

    <style>
        .cabecera{
            background-color: black;
            color: white;
        }
    </style>    
    </head>

    <body>
        <h1 class= "text-center">Lista de Productos</h1>
        <div class="card-body">
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ route('productos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Crear Nuevo Producto</a>
        </div>
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach ($productos as $producto)
                <div class="relative overflow-hidden rounded-lg shadow-lg group hover:shadow-xl hover:-translate-y-2">
                    <a href="{{ route('productos.edit', $producto) }}" class="absolute inset-0 z-10" rel="ugc">
                        <span class="sr-only">Ver</span>
                    </a>
                    <img src="{{ asset($producto->Img_producto) }}" alt="{{ $producto->Nom_producto }}" class="object-cover w-full h-64">
                    <div class="p-4 bg-background">
                        <h3 class="text-lg font-semibold">{{ $producto->Nom_producto }}</h3>
                        <div class="text-sm text-muted-foreground">S/.{{ $producto->Precio_producto }}</div>
                    </div>
                </div>
            @endforeach
        </section>


    </div>
                <!-- Bootstrap JavaScript Libraries -->
                <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
