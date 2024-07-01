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
        <h1 class= "text-center">Lista de Proveedores</h1>
        <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-primary text-primary-foreground font-medium">
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RUC</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo Electrónico</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proveedores as $proveedor)
                                            <tr class="hover:bg-gray-100">
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->ID_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->Nom_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->RUC_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->Telf_proveedores }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{ $proveedor->Correo_proveedores }}</td>

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
