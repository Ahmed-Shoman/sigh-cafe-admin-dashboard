<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OpinionSectionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'opinions' => collect($this->opinions)->map(function ($item) {
                return [
                    'image' => asset('storage/' . $item['image']),
                    'name' => $item['name'],
                    'position' => $item['position'],
                    'stars' => $item['stars'],
                    'comment' => $item['comment'],
                ];
            }),
        ];
    }
}