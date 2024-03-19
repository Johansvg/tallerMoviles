<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::all();
        if ($positions->isEmpty()) {
            return response()->json(['message' => 'No positions found'], 404);
        }
        return response()->json($positions, 200);
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
        $position = new Position();
        $position->departament_id = $request->departament_id;
        $position->name = $request->name;
        $position->hourly_rate = $request->hourly_rate;
        try {
            $position->save();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Position created'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $position = Position::find($id);
        if ($position === null) {
            return response()->json(['message' => 'Position not found'], 404);
        }
        return response()->json($position, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $position = Position::find($id);
        $position->departament_id = $request->departament_id;
        $position->name = $request->name;
        $position->hourly_rate = $request->hourly_rate;
        try {
            $position->save();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Position updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::find($id);
        if ($position === null) {
            return response()->json(['message' => 'Position not found'], 404);
        }
        try {
            $position->delete();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Position deleted'], 200);
    }
}
