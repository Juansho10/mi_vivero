<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Planta;
use Illuminate\Http\Request;

class PlantasController extends Controller
{
    // Obtener todas las plantas
    public function index()
    {
        $plantas = Planta::all();

        return response()->json($plantas);
    }

    // Obtener una planta por ID
    public function show($id)
    {
        $planta = Planta::findOrFail($id);

        return response()->json($planta);
    }

    // Crear una nueva planta
    public function store(Request $request)
    {
        $request->validate([
            'SKU' => 'required|unique:plantas',
            'Nombre' => 'required',
            'Tipo_Planta' => 'required',
            'ID_Categoria' => 'required|exists:categorias,id',
            // otras validaciones...
        ]);

        $planta = Planta::create($request->all());

        return response()->json($planta, 201);
    }

    // Actualizar una planta existente
    public function update(Request $request, $id)
    {
        $planta = Planta::findOrFail($id);

        $request->validate([
            'SKU' => 'required|unique:plantas,SKU,' . $planta->id,
            'Nombre' => 'required',
            'Tipo_Planta' => 'required',
            'ID_Categoria' => 'required|exists:categorias,id',
            // otras validaciones...
        ]);

        $planta->update($request->all());

        return response()->json($planta);
    }

    // Eliminar una planta
    public function destroy($id)
    {
        $planta = Planta::findOrFail($id);
        $planta->delete();

        return response()->json(null, 204);
    }
}
