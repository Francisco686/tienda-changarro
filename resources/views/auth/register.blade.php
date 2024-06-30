@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-image: url('{{ asset('assets/img/background.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card bg-primary text-white">
                <div class="card-header text-center">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-light btn-block">{{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: rgba(255, 255, 255, 0.9); /* Fondo semi-transparente */
        padding: 20px; /* Espaciado interior */
        font-family: 'Montserrat', sans-serif; /* Tipografía */
        color: #333;
    }
    .card {
        margin-top: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave */
        border-radius: 8px;
        border: none;
        background-color: #007bff; /* Fondo azul */
        color: #fff; /* Texto en blanco */
    }
    .card-header {
        background-color: #0069d9; /* Color de fondo del encabezado */
        color: #fff; /* Color del texto del encabezado */
        font-weight: bold;
        font-size: 1.5rem;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    .btn-light {
        background-color: #fff; /* Botón con fondo blanco */
        border-color: #fff;
        font-size: 1.2rem; /* Tamaño de la fuente */
        padding: 10px 20px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    .btn-light:hover {
        background-color: #f0f0f0; /* Color al pasar el ratón */
        border-color: #f0f0f0;
    }
    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 10px;
        font-size: 1rem;
        color: #333;
    }
    .invalid-feedback {
        font-size: 0.875rem;
    }
    .form-label {
        color: #fff;
    }
</style>
@endsection
