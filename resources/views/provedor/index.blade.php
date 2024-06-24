@extends('layouts.app')

@section('template_title')
    {{ __('Proveedores') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Lista de Proveedores') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('provedors.create') }}" class="btn btn-primary btn-sm" data-placement="left">
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
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($provedors as $provedor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $provedor->nombre }}</td>
                                            <td>{{ $provedor->direccion }}</td>
                                            <td>{{ $provedor->telefono }}</td>
                                            <td>{{ $provedor->correo }}</td>
                                            <td>
                                                <form action="{{ route('provedors.destroy', $provedor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('provedors.show', $provedor->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('provedors.edit', $provedor->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este proveedor?')"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $provedors->links() !!}
            </div>
        </div>
    </div>
@endsection



