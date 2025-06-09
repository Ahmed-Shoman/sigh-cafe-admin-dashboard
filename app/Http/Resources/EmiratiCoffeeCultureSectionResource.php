<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmiratiCoffeeCultureSectionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'videos' => collect($this->videos)->pluck('url'),
            'resources' => collect($this->resources)->map(function ($item) {
                return [
                    'icon' => asset('storage/' . $item['icon']),
                    'link' => $item['link'],
                ];
            }),
        ];
    }
}