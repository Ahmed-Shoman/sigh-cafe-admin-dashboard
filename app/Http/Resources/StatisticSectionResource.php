<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StatisticSectionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'stats' => collect($this->stats)->map(function ($item) {
                return [
                    'icon' => asset('storage/' . $item['icon']),
                    'number' => $item['number'],
                    'text' => $item['text'],
                ];
            }),
        ];
    }
}