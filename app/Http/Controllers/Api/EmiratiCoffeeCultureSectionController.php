<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmiratiCoffeeCultureSection;
use App\Http\Resources\EmiratiCoffeeCultureSectionResource;

class EmiratiCoffeeCultureSectionController extends Controller
{
    public function index()
    {
        $section = EmiratiCoffeeCultureSection::first();

        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        return response()->json(new EmiratiCoffeeCultureSectionResource($section), 200);
    }

    public function store(Request $request)
    {
        if (EmiratiCoffeeCultureSection::exists()) {
            return response()->json(['message' => 'Section already exists'], 400);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'videos' => 'nullable|array',
            'videos.*.url' => 'required|url',
            'resources' => 'nullable|array',
            'resources.*.icon' => 'required|string',
            'resources.*.link' => 'required|url',
        ]);

        $section = EmiratiCoffeeCultureSection::create($validated);

        return response()->json(['message' => 'Section created', 'data' => new EmiratiCoffeeCultureSectionResource($section)], 201);
    }

    public function update(Request $request, $id)
    {
        $section = EmiratiCoffeeCultureSection::find($id);

        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'videos' => 'nullable|array',
            'videos.*.url' => 'required|url',
            'resources' => 'nullable|array',
            'resources.*.icon' => 'required|string',
            'resources.*.link' => 'required|url',
        ]);

        $section->update($validated);

        return response()->json(['message' => 'Section updated', 'data' => new EmiratiCoffeeCultureSectionResource($section)], 200);
    }
}