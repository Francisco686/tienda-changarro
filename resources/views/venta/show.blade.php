@extends('layouts.app')

@section('template_title')
    Detalles de Venta - {{ $venta->id }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Detalles de Venta - {{ $venta->id }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="mb-3">ID de Venta:</h4>
                            <p>{{ $venta->id }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Fecha de Venta:</h4>
                            <p>{{ $venta->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Cliente:</h4>
                            <p>{{ $venta->cliente }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Total:</h4>
                            <p>${{ $venta->total }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Productos Vendidos:</h4>
                            @if ($venta->productos)
                                @if ($venta->productos->isNotEmpty())
                                    <ul>
                                        @foreach ($venta->productos as $producto)
                                            <li>{{ $producto->nombre }} ({{ $producto->pivot->cantidad }} unidades)</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No se encontraron productos vendidos.</p>
                                @endif
                            @else
                                <p>No hay información de productos vendidos.</p>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('ventas.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
