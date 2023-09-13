<?php

namespace App\Http\Controllers;

use App\Models\Subtarefa;
use Illuminate\Http\Request;

class SubtarefasController extends Controller
{
    public function index()
    {
        $subtarefas = Subtarefa::all();
        return response()->json($subtarefas);
    }

    public function show($id)
    {
        $subtarefa = Subtarefa::findOrFail($id);
        return response()->json($subtarefa);
    }

    public function store(Request $request)
    {
        $subtarefa = Subtarefa::create($request->all());
        return response()->json($subtarefa, 201);
    }

    public function update(Request $request, $id)
    {
        $subtarefa = Subtarefa::findOrFail($id);
        $subtarefa->update($request->all());
        return response()->json($subtarefa);
    }

    public function destroy($id)
    {
        $subtarefa = Subtarefa::findOrFail($id);
        $subtarefa->delete();
        return response()->json(null, 204);
    }
}
