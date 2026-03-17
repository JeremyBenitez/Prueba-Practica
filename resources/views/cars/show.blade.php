@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <i class="fas fa-info-circle"></i> <strong>Detalles del Carro</strong>
        </div>
        <div class="card-body">
            <div class="row">
                @if($car->image)
                <div class="col-md-5 text-center mb-3">
                    <img src="{{ asset('storage/' . $car->image) }}" alt="Imagen del carro" class="img-fluid rounded shadow" style="max-height: 300px;">
                </div>
                <div class="col-md-7">
                @else
                <div class="col-md-12">
                @endif
                    <dl class="row">
                        <dt class="col-sm-4">ID:</dt>
                        <dd class="col-sm-8">{{ $car->id }}</dd>

                        <dt class="col-sm-4">Marca:</dt>
                        <dd class="col-sm-8">{{ $car->marca }}</dd>

                        <dt class="col-sm-4">Modelo:</dt>
                        <dd class="col-sm-8">{{ $car->modelo }}</dd>

                        <dt class="col-sm-4">Año:</dt>
                        <dd class="col-sm-8">{{ $car->año }}</dd>

                        <dt class="col-sm-4">Precio:</dt>
                        <dd class="col-sm-8">${{ number_format($car->precio, 2) }}</dd>

                        <dt class="col-sm-4">Color:</dt>
                        <dd class="col-sm-8">{{ $car->color ?? 'No especificado' }}</dd>

                        <dt class="col-sm-4">Kilometraje:</dt>
                        <dd class="col-sm-8">{{ $car->kilometraje ?? 'No especificado' }}</dd>

                        <dt class="col-sm-4">Descripción:</dt>
                        <dd class="col-sm-8">{{ $car->descripcion ?? 'Sin descripción' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver al listado
            </a>
            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
        </div>
    </div>
</div>
@endsection