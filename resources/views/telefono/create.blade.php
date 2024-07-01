@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Telefono
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header" style="background-color: #007bff; color: white;">
                        <span class="card-title">{{ __('Create') }} Telefono</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('telefonos.store') }}" role="form">
                            @csrf

                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="provedor_id">Provedor</label>
                                <select name="provedor_id" class="form-control" required>
                                    <option value="">Select Provedor</option>
                                    @foreach($provedores as $provedor)
                                        <option value="{{ $provedor->id }}">{{ $provedor->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    body {
        background-color: #007bff; /* Color de fondo azul */
        color: white; /* Color de texto blanco */
    }
    .card {
        margin-top: 20px;
        background-color: rgba(255, 255, 255, 0.9); /* Fondo semi-transparente para la tarjeta */
        padding: 20px;
    }
    .card-header {
        background-color: #007bff; /* Color de fondo azul */
        color: white; /* Color de texto blanco */
    }
    .form-group label {
        color: #333; /* Color de texto para las etiquetas */
    }
    .form-control {
        border: 1px solid #ced4da; /* Borde estándar para los inputs */
        border-radius: 0.25rem; /* Esquinas redondeadas */
    }
    .btn-primary {
        background-color: #0069d9; /* Color azul más oscuro para el botón primario */
        border-color: #0062cc;
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Color de hover más oscuro */
        border-color: #004c99;
    }
</style>
@endsection
