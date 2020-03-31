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
	<div class="flex" id="app">
		{{-- Menú lateral --}}
		@include('admin.partials.sidenav')

		{{-- Contenido Principal --}}
		<section class="w-full min-h-screen">
			{{-- Barra superior --}}
			<section class="flex items-center h-16 p-4 bg-primary text-white">
				<button type="button" class="focus:outline-none">
					<i class="fa fa-bars fa-lg"></i>
				</button>

				<h2 class="px-4 leading-none font-semibold text-3xl">@yield('section-title')</h2>

				<a href="#" class="ml-auto p-2 hover:bg-primary-darker rounded text-center text-sm">
					<div>
						<i class="fa fa-sign-out-alt fa-lg"></i>
					</div>
					Cerrar sesión
				</a>
			</section>

			<main>
				@yield('content')
			</main>
		</section>
	</div>
</body>
</html>
