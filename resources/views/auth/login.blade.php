<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Universidad de Buenos Aires</title>

	{{-- Open sans font --}}
	{{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet"> --}}

	{{-- Estilos --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .login-box {
            width: 100%;
            max-width: 24rem;
        }
    </style>
</head>
<body>
    <section class="flex items-center justify-center min-h-screen bg-primary">
        <div class="login-box p-6 rounded-md bg-white text-gray-800">
            <h2 class="mb-4 leading-none text-center text-gray-800 text-4xl">Iniciar sesión</h2>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block mb-2">Correo eletrónico</label>
                    <input
                        type="text"
                        name="email"
                        class="form-control rounded-md"
                        autofocus
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <span class="form-error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-2">Contraseña</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control rounded-md"
                        value="{{ old('password') }}"
                    />
                    @error('password')
                        <span class="form-error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-right">
                    <button class="btn btn-primary">
                        Ingresar
                    </button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
