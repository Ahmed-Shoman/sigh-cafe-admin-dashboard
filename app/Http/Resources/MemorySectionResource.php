<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemorySectionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'subtitle' => $this->subtitle,
            'images' => collect($this->images)->map(function ($image) {
                return asset('storage/' . $image['path']);
            }),
        ];
    }
}