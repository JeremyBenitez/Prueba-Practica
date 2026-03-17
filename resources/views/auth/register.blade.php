@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="glass-card p-4">
            <div class="text-center mb-4">
                <i class="fas fa-user-plus fa-3x text-primary"></i>
                <h2 class="fw-bold mt-2">Crear cuenta</h2>
                <p class="text-muted">Comienza a gestionar tus carros</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                        <i class="fas fa-user-check"></i> Registrarse
                    </button>
                </div>

                <hr class="my-4">

                <div class="text-center">
                    <p class="text-muted">¿Ya tienes una cuenta?</p>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4">
                        <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection