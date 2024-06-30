@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Ventas al Mayoreo</h1>
    <a href="{{ route('venta_mayoreo.create') }}" class="btn btn-success mb-3">Crear Nueva Venta al Mayoreo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Mayoreo</th>
                <th>Producto</th>
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->id_mayoreo }}</td>
                <td>{{ $venta->producto->nombre }}</td>
                <td>{{ $venta->proveedor->nombre }}</td>
                <td>{{ optional($venta->fecha)->fecha }}</td>
                <td>
                    <a href="{{ route('venta_mayoreo.show', $venta->id_mayoreo) }}" class="btn btn-primary">Ver</a>
                    <a href="{{ route('venta_mayoreo.edit', $venta->id_mayoreo) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('venta_mayoreo.destroy', $venta->id_mayoreo) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta venta al mayoreo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
