@extends('layouts.app')

@section('template_title')
    Empleados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="background-color: #007bff; color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Empleados') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="background-color: #6c757d; color: #fff;">No</th>
                                        <th scope="col" style="background-color: #ffc107; color: #fff;">Nombre</th>
                                        <th scope="col" style="background-color: #28a745; color: #fff;">Puesto</th>
                                        <th scope="col" style="background-color: #dc3545; color: #fff;">Salario</th>
                                        <th scope="col" style="background-color: #007bff; color: #fff;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td style="background-color: #6c757d; color: #fff;">{{ ++$i }}</td>
                                            <td style="background-color: #ffc107; color: #fff;">{{ $empleado->nombre }}</td>
                                            <td style="background-color: #28a745; color: #fff;">{{ $empleado->puesto }}</td>
                                            <td style="background-color: #dc3545; color: #fff;">{{ $empleado->salario }}</td>
                                            <td style="background-color: #007bff; color: #fff;">
                                                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('empleados.show', $empleado->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleados.edit', $empleado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado?')"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $empleados->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <!-- Estilos específicos para la página de empleados -->
    <style>
        body {
            background-color: #007bff; /* Color de fondo azul */
            color: white; /* Color de texto blanco */
            font-family: 'Arial', sans-serif; /* Tipo de letra Arial o similar */
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
        .btn-success {
            background-color: #28a745; /* Color verde para botón de éxito */
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838; /* Color de hover más oscuro */
            border-color: #1e7e34;
        }
        .btn-danger {
            background-color: #dc3545; /* Color rojo para botón de peligro */
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Color de hover más oscuro */
            border-color: #bd2130;
        }
        .btn-info.btn-sm,
        .btn-primary.btn-sm,
        .btn-danger.btn-sm {
            margin-right: 5px; /* Espacio entre botones */
        }
        .table {
            background-color: #ffffff !important; /* Fondo blanco para la tabla */
        }
        .table th, .table td {
            border-color: #dddddd; /* Color de borde suave */
        }
    </style>
@endsection
