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
        <h1 class= "text-center">Lista de Clientes</h1>
        <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-primary text-primary-foreground font-medium">
                                            <th class="px-4 py-3 rounded-tl-lg">ID</th>
                                            <th class="px-4 py-3">Nombre</th>
                                            <th class="px-4 py-3">Apellido</th>
                                            <th class="px-4 py-3">Tipo Documento</th>
                                            <th class="px-4 py-3">Número de Documento</th>
                                            <th class="px-4 py-3">Celular</th>
                                            <th class="px-4 py-3">Correo Electrónico</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clientes as $cliente)
                                            <tr class="border-b hover:bg-muted">
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->ID_clientes }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Nom_cliente }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Ape_cliente }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Tipo_documento }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->DNI_cliente }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Cel_cliente }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $cliente->Correo_cliente }}</td>

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