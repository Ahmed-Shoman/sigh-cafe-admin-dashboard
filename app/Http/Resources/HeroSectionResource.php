<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HeroSectionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'cta_button' => $this->cta_button,
            'media' => $this->media ? asset('storage/' . $this->media) : null,
        ];
    }
}
