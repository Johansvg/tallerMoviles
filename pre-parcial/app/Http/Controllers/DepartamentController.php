<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departaments = Departament::all();
        if ($departaments->isEmpty()) {
            return response()->json(['message' => 'No departaments found'], 404);
        }
        return response()->json($departaments, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departament = new Departament();
        $departament->name = $request->name;
        try {
            $departament->save();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Departament created'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departament = Departament::find($id);

        if ($departament === null) {
            return response()->json(['message' => 'Departament not found'], 404);
        }
        return response()->json($departament, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departament = Departament::find($id);
        $departament->name = $request->name;
        try {
            $departament->save();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Departament updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departament = Departament::find($id);
        if ($departament.isEmpty()) {
            return response()->json(['message' => 'Departament not found'], 404);
        }
        try {
            $departament->delete();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Departament deleted'], 200);
    }
}
