<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'logo' => $this->logo ? asset('storage/' . $this->logo) : null,
            'links' => $this->links,
        ];
    }
}