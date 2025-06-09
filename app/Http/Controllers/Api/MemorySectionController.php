<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemorySection;
use App\Http\Resources\MemorySectionResource;

class MemorySectionController extends Controller
{
    public function index()
    {
        $section = MemorySection::first();

        if (!$section) {
            return response()->json(['message' => 'Memory section not found'], 404);
        }

        return response()->json(new MemorySectionResource($section), 200);
    }

    public function store(Request $request)
    {
        if (MemorySection::exists()) {
            return response()->json(['message' => 'Memory section already exists'], 400);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subtitle' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*.path' => 'required|string',
        ]);

        $section = MemorySection::create($validated);

        return response()->json(['message' => 'Memory section created', 'data' => new MemorySectionResource($section)], 201);
    }

    public function update(Request $request, $id)
    {
        $section = MemorySection::find($id);

        if (!$section) {
            return response()->json(['message' => 'Memory section not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subtitle' => 'nullable|string|max:255',
            'images' => 'nullable|array',
            'images.*.path' => 'required|string',
        ]);

        $section->update($validated);

        return response()->json(['message' => 'Memory section updated', 'data' => new MemorySectionResource($section)], 200);
    }
}