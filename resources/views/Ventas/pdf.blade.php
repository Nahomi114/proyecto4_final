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
        <h1 class= "text-center">Lista de Ventas</h1>
        <table class="w-full table-auto min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-3">ID Venta</th>
                                <th class="px-6 py-3">Cliente</th>
                                <th class="px-6 py-3">Usuario</th>
                                <th class="px-6 py-3">Fecha de Venta</th>
                                <th class="px-6 py-3">Total</th>
                                <th class="px-6 py-3">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($ventas as $venta)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $venta->ID_ventas }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $venta->cliente ? $venta->cliente->Nom_cliente : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $venta->usuario ? $venta->usuario->name : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $venta->fecha_venta ? \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $venta->total }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('ventas.update', $venta->ID_ventas) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn {{ $venta->Estado == 'Pagado' ? 'btn-success' : 'btn-warning' }}">
                                                {{ $venta->Estado }}
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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