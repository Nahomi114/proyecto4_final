<!-- resources/views/search.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Categoría</title>
    <!-- Incluir Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-lg mt-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Buscar Categoría</h1>
        
        <!-- Formulario de búsqueda -->
        <form action="{{ route('categorias.search') }}" method="GET" class="flex mb-4">
            <input type="text" name="search_key" placeholder="Buscar por nombre de categoría" class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:border-blue-500 flex-1">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-r-md focus:outline-none">Buscar</button>
        </form>

        <!-- Resultados de la búsqueda -->
        @if (session('result'))
            <div class="bg-blue-100 border-t-4 border-blue-500 rounded-b-lg px-4 py-3 shadow-md">
                <p class="text-lg text-blue-800 font-semibold mb-2">{{ session('result')->Nom_categorias }}</p>
                <p class="text-gray-700">{{ session('result')->Desc_categorias }}</p>
            </div>
        @endif
    </div>
</body>
</html>
