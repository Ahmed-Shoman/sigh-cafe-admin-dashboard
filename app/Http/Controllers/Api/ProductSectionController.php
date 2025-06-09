<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSection;
use App\Http\Resources\ProductSectionResource;

class ProductSectionController extends Controller
{
    public function index()
    {
        $section = ProductSection::first();

        if (!$section) {
            return response()->json(['message' => 'Product section not found'], 404);
        }

        return response()->json(new ProductSectionResource($section), 200);
    }

    public function store(Request $request)
    {
        if (ProductSection::exists()) {
            return response()->json(['message' => 'Product section already exists'], 400);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'products' => 'nullable|array',
            'products.*.image' => 'required|string',
            'products.*.text' => 'required|string|max:255',
            'products.*.subtext' => 'nullable|string',
            'products.*.price' => 'nullable|string',
            'products.*.button.text' => 'nullable|string',
            'products.*.button.link' => 'nullable|url',
            'readmore_title' => 'nullable|string|max:255',
            'readmore_link' => 'nullable|url',
            'specific_program' => 'boolean',

        ]);

        $section = ProductSection::create($validated);

        return response()->json(['message' => 'Product section created', 'data' => new ProductSectionResource($section)], 201);
    }

    public function update(Request $request, $id)
    {
        $section = ProductSection::find($id);

        if (!$section) {
            return response()->json(['message' => 'Product section not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'products' => 'nullable|array',
            'products.*.image' => 'required|string',
            'products.*.text' => 'required|string|max:255',
            'products.*.subtext' => 'nullable|string',
            'products.*.price' => 'nullable|string',
            'products.*.button.text' => 'nullable|string',
            'products.*.button.link' => 'nullable|url',
            'readmore_title' => 'nullable|string|max:255',
            'readmore_link' => 'nullable|url',
            'specific_program' => 'boolean',
        ]);

        $section->update($validated);

        return response()->json(['message' => 'Product section updated', 'data' => new ProductSectionResource($section)], 200);
    }
}
