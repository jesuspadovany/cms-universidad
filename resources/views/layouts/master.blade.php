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
                            C104AAF / CABA Argentina / +54 11 4953-5405 <br>
                            Seguinos y suscribete al Newsletter
                        </p>
                        <div class="flex items-center mt-2">
                            <a href="#" class="mr-2">
                                <img src="{{ asset('images/facebook.png') }}" alt="facebook">
                            </a>
                            <a href="#" class="mr-2">
                                <img src="{{ asset('images/twitter.png') }}" alt="twitter">
                            </a>
                            <a href="#" class="mr-2">
                                <img src="{{ asset('images/play.png') }}" alt="play">
                            </a>
                            <a href="#" class="mr-2">
                                <img src="{{ asset('images/instagram.png') }}" alt="instagram">
                            </a>
                            <button type="button" class="px-3 py-2 rounded-md border-2 border-white text-sm">
                                Suscribete al Newsletter
                                <i class="fas fa-envelope ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
