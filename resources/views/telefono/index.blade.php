@extends('layouts.app')

@section('template_title')
    Telefonos
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #007bff; color: white;">
                    <h2>{{ __('Telefonos') }}</h2>
                    <a href="{{ route('telefonos.create') }}" class="btn btn-warning btn-lg">Agregar Telefono</a> <!-- Botón más grande y llamativo -->
                </div>

                <div class="card-body" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px;">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="background-color: #ffffff;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="background-color: #6c757d; color: #fff;">ID</th> <!-- Fondo gris para ID -->
                                    <th scope="col" style="background-color: #ffc107; color: #212529;">Telefono</th> <!-- Fondo amarillo para telefono -->
                                    <th scope="col" style="background-color: #28a745; color: #fff;">Proveedor</th> <!-- Fondo verde para proveedor -->
                                    <th scope="col" style="background-color: #007bff; color: #fff;">Acciones</th> <!-- Fondo azul para acciones -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($telefonos as $telefono)
                                    <tr>
                                        <td style="background-color: #6c757d; color: #fff;">{{ $telefono->id }}</td> <!-- Fondo gris para ID -->
                                        <td style="background-color: #ffc107; color: #212529;">{{ $telefono->telefono }}</td> <!-- Fondo amarillo para telefono -->
                                        <td style="background-color: #28a745; color: #fff;">{{ $telefono->provedor->nombre }}</td> <!-- Fondo verde para proveedor -->
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('telefonos.show', $telefono->id) }}" style="background-color: #007bff; color: #fff; font-weight: bold;">Mostrar</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('telefonos.edit', $telefono->id) }}" style="background-color: #0069d9; border-color: #0062cc; color: #fff; font-weight: bold;">Editar</a>
                                            <form action="{{ route('telefonos.destroy', $telefono->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" style="background-color: #dc3545; border-color: #dc3545; color: #fff; font-weight: bold;" onclick="return confirm('¿Estás seguro de eliminar este teléfono?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {!! $telefonos->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
    <!-- Estilos específicos para la página de teléfonos -->
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
        .btn-primary {
            background-color: #0069d9; /* Color azul más oscuro para el botón primario */
            border-color: #0062cc;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Color de hover más oscuro */
            border-color: #004c99;
        }
        .btn-warning {
            background-color: #ffc107; /* Color amarillo para el botón de advertencia */
            border-color: #ffc107;
            color: #212529; /* Color de texto oscuro */
        }
        .btn-warning:hover {
            background-color: #e0a800; /* Color de hover más oscuro */
            border-color: #d39e00;
        }
        .btn-info.btn-sm:hover,
        .btn-primary.btn-sm:hover,
        .btn-danger.btn-sm:hover {
            opacity: 0.9; /* Reducir la opacidad al pasar el cursor para indicar interactividad */
        }
        .table {
            background-color: #ffffff !important; /* Fondo blanco para la tabla */
        }
        .table th, .table td {
            border-color: #dddddd; /* Color de borde suave */
        }
    </style>
@endsection
