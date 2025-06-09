<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatisticSection;
use App\Http\Resources\StatisticSectionResource;

class StatisticSectionController extends Controller
{
    public function index()
    {
        $section = StatisticSection::first();

        if (!$section) {
            return response()->json(['message' => 'Statistic section not found'], 404);
        }

        return response()->json(new StatisticSectionResource($section), 200);
    }

    public function store(Request $request)
    {
        if (StatisticSection::exists()) {
            return response()->json(['message' => 'Statistic section already exists'], 400);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stats' => 'nullable|array',
            'stats.*.icon' => 'required|string',
            'stats.*.number' => 'required|numeric',
            'stats.*.text' => 'required|string|max:255',
        ]);

        $section = StatisticSection::create($validated);

        return response()->json(['message' => 'Statistic section created', 'data' => new StatisticSectionResource($section)], 201);
    }

    public function update(Request $request, $id)
    {
        $section = StatisticSection::find($id);

        if (!$section) {
            return response()->json(['message' => 'Statistic section not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stats' => 'nullable|array',
            'stats.*.icon' => 'required|string',
            'stats.*.number' => 'required|numeric',
            'stats.*.text' => 'required|string|max:255',
        ]);

        $section->update($validated);

        return response()->json(['message' => 'Statistic section updated', 'data' => new StatisticSectionResource($section)], 200);
    }
}
