@extends('layouts.app')

@section('template_title')
    {{ __('Show') }} Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Show') }} Venta</span>
                    </div>
                    <div class="card-body bg-white">
                        <div class="form-group">
                            <strong>{{ __('ID:') }}</strong>
                            {{ $venta->id }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('Cantidad:') }}</strong>
                            {{ $venta->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('Producto:') }}</strong>
                            {{ $venta->producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('Precio Unitario:') }}</strong>
                            {{ $venta->precio_unitario }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('Total:') }}</strong>
                            {{ $venta->total }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('Fecha de Creación:') }}</strong>
                            {{ $venta->created_at }}
                        </div>
                        <div class="form-group">
                            <strong>{{ __('Fecha de Actualización:') }}</strong>
                            {{ $venta->updated_at }}
                        </div>
                        <a class="btn btn-primary" href="{{ route('ventas.index') }}">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
