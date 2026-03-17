<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Estadísticas
        $totalCars = Car::count();
        $averagePrice = Car::avg('precio');
        $maxPrice = Car::max('precio');
        $minPrice = Car::min('precio');
        $carsByBrand = Car::selectRaw('marca, count(*) as total')
                            ->groupBy('marca')
                            ->orderBy('total', 'desc')
                            ->get();
        $carsByYear = Car::selectRaw('año, count(*) as total')
                            ->groupBy('año')
                            ->orderBy('año', 'desc')
                            ->get();

        return view('admin.index', compact('totalCars', 'averagePrice', 'maxPrice', 'minPrice', 'carsByBrand', 'carsByYear'));
    }
}