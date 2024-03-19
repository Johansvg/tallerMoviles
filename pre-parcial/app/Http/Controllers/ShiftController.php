<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::all();
        if ($shifts->isEmpty()) {
            return response()->json(['message' => 'No shifts found'], 404);
        }
        return response()->json($shifts, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shift = new Shift();
        $shift->employee_id = $request->employee_id;
        $shift->shift_start = $request->shift_start;
        $shift->shift_end = $request->shift_end;
        try {
            $shift->save();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Shift created'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shift = Shift::find($id);
        if ($shift === null) {
            return response()->json(['message' => 'Shift not found'], 404);
        }
        return response()->json($shift, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shift = Shift::find($id);
        $shift->employee_id = $request->employee_id;
        $shift->shift_start = $request->shift_start;
        $shift->shift_end = $request->shift_end;
        try {
            $shift->save();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Shift updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shift = Shift::find($id);
        if ($shift === null) {
            return response()->json(['message' => 'Shift not found'], 404);
        }
        try {
            $shift->delete();
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }
        return response()->json(['message' => 'Shift deleted'], 200);
    }
}
