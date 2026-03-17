@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="fas fa-chart-bar"></i> Panel de Administración</h1>
    <p class="lead">Estadísticas de los carros registrados</p>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3 shadow">
                <div class="card-header"><i class="fas fa-car"></i> Total de Carros</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $totalCars }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3 shadow">
                <div class="card-header"><i class="fas fa-dollar-sign"></i> Precio Promedio</div>
                <div class="card-body">
                    <h2 class="card-title">${{ number_format($averagePrice, 2) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3 shadow">
                <div class="card-header"><i class="fas fa-arrow-up"></i> Precio Máximo</div>
                <div class="card-body">
                    <h2 class="card-title">${{ number_format($maxPrice, 2) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3 shadow">
                <div class="card-header"><i class="fas fa-arrow-down"></i> Precio Mínimo</div>
                <div class="card-body">
                    <h2 class="card-title">${{ number_format($minPrice, 2) }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-chart-bar"></i> Carros por Marca
                </div>
                <div class="card-body">
                    <canvas id="brandChart" style="max-height: 300px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-chart-line"></i> Carros por Año
                </div>
                <div class="card-body">
                    <canvas id="yearChart" style="max-height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de marcas
    const brandCtx = document.getElementById('brandChart').getContext('2d');
    const brandChart = new Chart(brandCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($carsByBrand->pluck('marca')->toArray()) !!},
            datasets: [{
                label: 'Cantidad de Carros',
                data: {!! json_encode($carsByBrand->pluck('total')->toArray()) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: { y: { beginAtZero: true, stepSize: 1 } }
        }
    });

    // Gráfico de años
    const yearCtx = document.getElementById('yearChart').getContext('2d');
    const yearChart = new Chart(yearCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($carsByYear->pluck('año')->toArray()) !!},
            datasets: [{
                label: 'Cantidad de Carros',
                data: {!! json_encode($carsByYear->pluck('total')->toArray()) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: { y: { beginAtZero: true, stepSize: 1 } }
        }
    });
</script>
@endsection