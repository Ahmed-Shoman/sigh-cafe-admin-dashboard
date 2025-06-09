<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PreparationProcessResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'steps' => collect($this->steps)->map(function ($step) {
                return [
                    'icon' => asset('storage/' . $step['icon']),
                    'text' => $step['text'] ?? '',
                    'subtext' => $step['subtext'] ?? '',
                ];
            }),
        ];
    }
}