<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OpinionSection;
use App\Http\Resources\OpinionSectionResource;

class OpinionSectionController extends Controller
{
    public function index()
    {
        $section = OpinionSection::first();

        if (!$section) {
            return response()->json(['message' => 'Opinion section not found'], 404);
        }

        return response()->json(new OpinionSectionResource($section), 200);
    }

    public function store(Request $request)
    {
        if (OpinionSection::exists()) {
            return response()->json(['message' => 'Opinion section already exists'], 400);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'opinions' => 'nullable|array',
            'opinions.*.image' => 'required|string',
            'opinions.*.name' => 'required|string|max:255',
            'opinions.*.position' => 'nullable|string|max:255',
            'opinions.*.stars' => 'required|numeric|min:1|max:5',
            'opinions.*.comment' => 'required|string',
        ]);

        $section = OpinionSection::create($validated);

        return response()->json(['message' => 'Opinion section created', 'data' => new OpinionSectionResource($section)], 201);
    }

    public function update(Request $request, $id)
    {
        $section = OpinionSection::find($id);

        if (!$section) {
            return response()->json(['message' => 'Opinion section not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'opinions' => 'nullable|array',
            'opinions.*.image' => 'required|string',
            'opinions.*.name' => 'required|string|max:255',
            'opinions.*.position' => 'nullable|string|max:255',
            'opinions.*.stars' => 'required|numeric|min:1|max:5',
            'opinions.*.comment' => 'required|string',
        ]);

        $section->update($validated);

        return response()->json(['message' => 'Opinion section updated', 'data' => new OpinionSectionResource($section)], 200);
    }
}