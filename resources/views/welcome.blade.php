<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        /* Agrega aquí tus estilos adicionales si es necesario */
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <img id="background" class="absolute left-0 top-0 w-screen h-screen object-cover z-0" src="https://img.freepik.com/vector-gratis/fondo-monocromatico-blanco-degradado_23-2149026464.jpg?w=1380&t=st=1719834995~exp=1719835595~hmac=f9a02c76863ea47c2d34209a987181496dc67e0c22e03b84cb52c9796d9c3134" />
    <div class="relative z-10">
        <header class="bg-gray-900 text-white py-4 px-6">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div>
                    <a href="#" class="text-2xl font-bold">Logo</a>
                </div>
                <nav>
                    <ul class="flex space-x-4">

                    @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="text-white hover:text-gray-300"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="text-white hover:text-gray-300"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="text-white hover:text-gray-300"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
                    </ul>
                </nav>
            </div>
        </header>

        <div class="min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="w-full max-w-2xl px-6 lg:max-w-7xl text-center">
                <main class="mt-6">
                    <div class="text-4xl font-bold mb-8">Bienvenido a mi página</div>
                    <p class="text-lg text-gray-800 mb-4">Esta es una página de ejemplo para mostrar cómo usar Tailwind CSS con Laravel.</p>
                    <p class="text-lg text-gray-800 mb-4">Puedes agregar más contenido aquí según tus necesidades.</p>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    <!-- Contenido del footer -->
                </footer>
            </div>
        </div>
    </div>
</div>
</body>
</html>
