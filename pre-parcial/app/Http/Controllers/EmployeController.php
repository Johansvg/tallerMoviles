<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all();
        if ($employes->isEmpty()) {
            return response()->json(['message' => 'No employes found'], 404);
        }
        return response()->json($employes, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employe = new Employe();
        $employe->position_id = $request->position_id;
        $employe->name = $request->name;
        $employe->last_name = $request->last_name;
        $employe->card = $request->card;
        $employe->start_date = $request->start_date;

        try {
            $employe->save();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Employe created'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        $employe = Employe::find($id);
        if ($employe === null) {
            return response()->json(['message' => 'Employe not found'], 404);
        }
        return response()->json($employe, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employe = Employe::find($id);
        $employe->position_id = $request->position_id;
        $employe->name = $request->name;
        $employe->last_name = $request->last_name;
        $employe->card = $request->card;
        $employe->start_date = $request->start_date;
        try {
            $employe->save();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Employe updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employe = Employe::find($id);
        if ($employe === null) {
            return response()->json(['message' => 'Employe not found'], 404);
        }
        try {
            $employe->delete();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Employe deleted'], 200);
    }
}
