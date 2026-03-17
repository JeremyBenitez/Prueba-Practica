<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Para manejar imágenes

class CarController extends Controller
{
    /**
     * Display a listing of the resource (con filtros).
     */
    public function index(Request $request)
    {
        $query = Car::query();

        // Filtros
        if ($request->filled('marca')) {
            $query->where('marca', 'like', '%' . $request->marca . '%');
        }
        if ($request->filled('modelo')) {
            $query->where('modelo', 'like', '%' . $request->modelo . '%');
        }
        if ($request->filled('año')) {
            $query->where('año', $request->año);
        }
        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }
        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        $cars = $query->get();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage (con imagen).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'año' => 'required|integer|min:1900|max:' . date('Y'),
            'precio' => 'required|numeric|min:0',
            'color' => 'nullable|string|max:50',
            'kilometraje' => 'nullable|integer|min:0',
            'descripcion' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Subir imagen si existe
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
            $validated['image'] = $imagePath;
        }

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Carro creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage (con imagen).
     */
   public function update(Request $request, Car $car)
{
    $validated = $request->validate([
        'marca' => 'required|string|max:255',
        'modelo' => 'required|string|max:255',
        'año' => 'required|integer|min:1900|max:' . date('Y'),
        'precio' => 'required|numeric|min:0',
        'color' => 'nullable|string|max:50',
        'kilometraje' => 'nullable|integer|min:0',
        'descripcion' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Manejar la subida de la imagen
    if ($request->hasFile('image')) {
        // Eliminar la imagen anterior si existe
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }
        $imagePath = $request->file('image')->store('cars', 'public');
        $validated['image'] = $imagePath;
    }

    $car->update($validated);

    return redirect()->route('cars.index')->with('success', 'Carro actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
{
    if ($car->image) {
        Storage::disk('public')->delete($car->image);
    }
    $car->delete();
    return redirect()->route('cars.index')->with('success', 'Carro eliminado correctamente.');
}
}