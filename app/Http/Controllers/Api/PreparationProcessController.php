<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PreparationProcess;
use App\Http\Resources\PreparationProcessResource;

class PreparationProcessController extends Controller
{
    public function index()
    {
        $section = PreparationProcess::first();

        if (!$section) {
            return response()->json(['message' => 'Preparation process not found'], 404);
        }

        return response()->json(new PreparationProcessResource($section), 200);
    }

    public function store(Request $request)
    {
        if (PreparationProcess::exists()) {
            return response()->json(['message' => 'Preparation process already exists'], 400);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'steps' => 'nullable|array',
            'steps.*.icon' => 'required|string',
            'steps.*.text' => 'required|string',
            'steps.*.subtext' => 'nullable|string',
        ]);

        $section = PreparationProcess::create($validated);

        return response()->json(['message' => 'Preparation process created', 'data' => new PreparationProcessResource($section)], 201);
    }

    public function update(Request $request, $id)
    {
        $section = PreparationProcess::find($id);

        if (!$section) {
            return response()->json(['message' => 'Preparation process not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'steps' => 'nullable|array',
            'steps.*.icon' => 'required|string',
            'steps.*.text' => 'required|string',
            'steps.*.subtext' => 'nullable|string',
        ]);

        $section->update($validated);

        return response()->json(['message' => 'Preparation process updated', 'data' => new PreparationProcessResource($section)], 200);
    }
}
