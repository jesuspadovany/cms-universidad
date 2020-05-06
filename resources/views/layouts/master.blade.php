<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Universidad de Buenos Aires</title>

	{{-- Open sans font --}}
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">

	{{-- Font Awesome --}}
	<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

	{{-- Estilos --}}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div id="app">
        {{-- Navbar --}}
        <the-navbar></the-navbar>

        {{-- Slider --}}
        <div class="hero-section-h relative bg-blue-500">
            @yield('header')
        </div>

        <div>
            @yield('content')
        </div>

        <footer class="footer text-white bg-black">
            <div class="container mx-auto p-24">
                <div class="flex">
                    <div class="w-1/2">
                        <h2 class="mb-4 font-semibold text-5xl text-primary">UBA</h2>
                        <p class="text-2xl">
                            Secretaría de Relaciones <br>
                            Institucionales, Culturales <br>
                            y Comunicación
                        </p>
                    </div>
                    <div class="w-1/2">
                        <h2 class="mb-4 text-5xl text-primary">Centro Cultural Rojas</h2>
                        <p class="text-2xl">
                            C104AAF / CABA Argentina <br>
                            +54 11 4953-5405
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
