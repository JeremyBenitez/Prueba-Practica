@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <i class="fas fa-edit"></i> <strong>Editar Carro</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="marca" class="form-label">Marca *</label>
                        <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" value="{{ old('marca', $car->marca) }}" required>
                        @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="modelo" class="form-label">Modelo *</label>
                        <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="{{ old('modelo', $car->modelo) }}" required>
                        @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="año" class="form-label">Año *</label>
                        <input type="number" class="form-control @error('año') is-invalid @enderror" id="año" name="año" value="{{ old('año', $car->año) }}" required min="1900" max="{{ date('Y') }}">
                        @error('año') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="precio" class="form-label">Precio (USD) *</label>
                        <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{ old('precio', $car->precio) }}" required>
                        @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', $car->color) }}">
                        @error('color') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kilometraje" class="form-label">Kilometraje</label>
                        <input type="number" class="form-control @error('kilometraje') is-invalid @enderror" id="kilometraje" name="kilometraje" value="{{ old('kilometraje', $car->kilometraje) }}">
                        @error('kilometraje') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Imagen del carro</label>
                        @if($car->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $car->image) }}" alt="Imagen actual" style="max-width: 150px; max-height: 100px;" class="rounded border">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <small class="text-muted">Dejar vacío para mantener la imagen actual. Formatos: jpeg, png, jpg, gif. Máx 2MB.</small>
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $car->descripcion) }}</textarea>
                        @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('cars.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Actualizar Carro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection