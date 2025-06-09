<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoryArticleSectionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'subtitle' => $this->subtitle,
            'items' => collect($this->items)->map(function ($item) {
                return [
                    'image' => asset('storage/' . $item['image']),
                    'cta_button' => [
                        'text' => $item['cta_button']['text'] ?? '',
                        'link' => $item['cta_button']['link'] ?? '',
                    ],
                    'history' => $item['history'] ?? '',
                    'views' => $item['views'] ?? 0,
                ];
            }),
        ];
    }
}