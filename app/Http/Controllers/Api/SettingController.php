<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Resources\SettingResource;

class SettingController extends Controller
{
    // ✅ 1. عرض بيانات الإعدادات
    public function index()
    {
        $setting = Setting::first();
        if (!$setting) {
            return response()->json(['message' => 'No settings found'], 404);
        }

        return response()->json(new SettingResource($setting), 200);
    }

    // ✅ 2. إنشاء أول إدخال فقط (لو مش موجود)
    public function store(Request $request)
    {
        if (Setting::exists()) {
            return response()->json(['message' => 'Settings already exist'], 400);
        }

        $validatedData = $request->validate([
            'logo' => 'nullable|string',
            'links' => 'nullable|array',
            'links.*.name' => 'required|string|max:255',
            'links.*.link' => 'required|url',
        ]);

        $setting = Setting::create($validatedData);

        return response()->json(['message' => 'Settings created successfully', 'data' => new SettingResource($setting)], 201);
    }

    // ✅ 3. تحديث بيانات الإعدادات
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        if (!$setting) {
            return response()->json(['message' => 'Settings not found'], 404);
        }

        $validatedData = $request->validate([
            'logo' => 'nullable|string',
            'links' => 'nullable|array',
            'links.*.name' => 'required|string|max:255',
            'links.*.link' => 'required|url',
        ]);

        $setting->update($validatedData);

        return response()->json(['message' => 'Settings updated successfully', 'data' => new SettingResource($setting)], 200);
    }
}