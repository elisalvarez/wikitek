@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center">{{ __('Iniciar sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Correo Electrónico -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Ingresa tu correo electrónico">
                            
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Ingresa tu contraseña">
                            
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Recordarme -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">{{ __('Recordarme') }}</label>
                        </div>

                        <!-- Botón de inicio de sesión -->
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Iniciar sesión') }}</button>
                        </div>

                        <!-- Enlace para la contraseña olvidada -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                        @endif
                    </form>

                    <!-- Botón para redirigir al registro si no tiene cuenta -->
                    <div class="text-center mt-3">
                        <p>{{ __("¿No tienes cuenta?") }}</p>
                        <a href="{{ route('registro.store') }}" class="btn btn-secondary w-100">{{ __('Regístrate aquí') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
