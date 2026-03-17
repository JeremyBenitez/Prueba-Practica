@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="fas fa-car"></i> Listado de Carros</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Filtros -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-filter"></i> <strong>Filtros de búsqueda</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('cars.index') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="{{ request('marca') }}" placeholder="Ej: Toyota">
                </div>
                <div class="col-md-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="{{ request('modelo') }}" placeholder="Ej: Corolla">
                </div>
                <div class="col-md-2">
                    <label for="año" class="form-label">Año</label>
                    <input type="number" class="form-control" id="año" name="año" value="{{ request('año') }}" min="1900" max="{{ date('Y') }}" placeholder="2022">
                </div>
                <div class="col-md-2">
                    <label for="precio_min" class="form-label">Precio mín.</label>
                    <input type="number" step="0.01" class="form-control" id="precio_min" name="precio_min" value="{{ request('precio_min') }}" placeholder="1000">
                </div>
                <div class="col-md-2">
                    <label for="precio_max" class="form-label">Precio máx.</label>
                    <input type="number" step="0.01" class="form-control" id="precio_max" name="precio_max" value="{{ request('precio_max') }}" placeholder="50000">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                    <a href="{{ route('cars.index') }}" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Limpiar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('cars.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Agregar Carro
        </a>
        <span class="text-muted">Total: {{ $cars->count() }} carro(s)</span>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>
                        @if($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" alt="Imagen" style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                        @else
                            <span class="text-muted"><i class="fas fa-image"></i> No</span>
                        @endif
                    </td>
                    <td>{{ $car->marca }}</td>
                    <td>{{ $car->modelo }}</td>
                    <td>{{ $car->año }}</td>
                    <td>${{ number_format($car->precio, 2) }}</td>
                    <td>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este carro?')" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay carros registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection