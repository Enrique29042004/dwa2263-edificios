<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
    /**
     * GET /api/edificios
     * Lista todos los edificios junto con sus aulas.
     */
    public function index(): JsonResponse
    {
        $edificios = Edificio::with('aulas')->get();
        return response()->json($edificios);
    }

    /**
     * POST /api/edificios
     * Crea un edificio nuevo.
     */
    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $nuevo = Edificio::create($datos);

        return response()->json($nuevo, 201);
    }

    /**
     * GET /api/edificios/{edificio}
     * Muestra un edificio con sus aulas.
     */
    public function show(Edificio $edificio): JsonResponse
    {
        return response()->json($edificio->load('aulas'));
    }

    /**
     * PUT/PATCH /api/edificios/{edificio}
     * Actualiza el nombre de un edificio.
     */
    public function update(Request $request, Edificio $edificio): JsonResponse
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $edificio->update($datos);

        return response()->json($edificio->load('aulas'));
    }

    /**
     * DELETE /api/edificios/{edificio}
     * Elimina un edificio. Sus aulas no se borran: quedan con edificio_id = NULL.
     */
    public function destroy(Edificio $edificio): JsonResponse
    {
        $edificio->delete();

        return response()->json($edificio);
    }
}
