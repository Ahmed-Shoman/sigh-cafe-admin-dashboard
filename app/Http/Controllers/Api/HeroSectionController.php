<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Http\Resources\HeroSectionResource;

class HeroSectionController extends Controller
{
    public function index()
    {
        $section = HeroSection::first();

        if (!$section) {
            return response()->json(['message' => 'No hero section found'], 404);
        }

        return response()->json(new HeroSectionResource($section), 200);
    }

    public function store(Request $request)
    {
        if (HeroSection::exists()) {
            return response()->json(['message' => 'Hero section already exists'], 400);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cta_button' => 'nullable|array',
            'cta_button.text' => 'required_with:cta_button|string|max:255',
            'cta_button.link' => 'required_with:cta_button|url',
            'media' => 'nullable|string',
        ]);

        $section = HeroSection::create($validated);

        return response()->json(['message' => 'Hero section created', 'data' => new HeroSectionResource($section)], 201);
    }

    public function update(Request $request, $id)
    {
        $section = HeroSection::find($id);

        if (!$section) {
            return response()->json(['message' => 'Hero section not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cta_button' => 'nullable|array',
            'cta_button.text' => 'required_with:cta_button|string|max:255',
            'cta_button.link' => 'required_with:cta_button|url',
            'media' => 'nullable|string',
        ]);

        $section->update($validated);

        return response()->json(['message' => 'Hero section updated', 'data' => new HeroSectionResource($section)], 200);
    }
}