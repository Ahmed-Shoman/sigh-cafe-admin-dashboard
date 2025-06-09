<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoryArticleSection;
use App\Http\Resources\StoryArticleSectionResource;

class StoryArticleSectionController extends Controller
{
    public function index()
    {
        $section = StoryArticleSection::first();

        if (!$section) {
            return response()->json(['message' => 'Stories and articles section not found'], 404);
        }

        return response()->json(new StoryArticleSectionResource($section), 200);
    }

    public function store(Request $request)
    {
        if (StoryArticleSection::exists()) {
            return response()->json(['message' => 'Section already exists'], 400);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subtitle' => 'nullable|string|max:255',
            'items' => 'nullable|array',
            'items.*.image' => 'required|string',
            'items.*.cta_button.text' => 'required|string',
            'items.*.cta_button.link' => 'required|url',
            'items.*.history' => 'nullable|string',
            'items.*.views' => 'nullable|numeric',
        ]);

        $section = StoryArticleSection::create($validated);

        return response()->json(['message' => 'Section created', 'data' => new StoryArticleSectionResource($section)], 201);
    }

    public function update(Request $request, $id)
    {
        $section = StoryArticleSection::find($id);

        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subtitle' => 'nullable|string|max:255',
            'items' => 'nullable|array',
            'items.*.image' => 'required|string',
            'items.*.cta_button.text' => 'required|string',
            'items.*.cta_button.link' => 'required|url',
            'items.*.history' => 'nullable|string',
            'items.*.views' => 'nullable|numeric',
        ]);

        $section->update($validated);

        return response()->json(['message' => 'Section updated', 'data' => new StoryArticleSectionResource($section)], 200);
    }
}