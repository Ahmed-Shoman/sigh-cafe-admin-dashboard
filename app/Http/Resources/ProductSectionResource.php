<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSectionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'products' => collect($this->products)->map(function ($product) {
                return [
                    'image' => asset('storage/' . $product['image']),
                    'text' => $product['text'] ?? '',
                    'subtext' => $product['subtext'] ?? '',
                    'price' => $product['price'] ?? '',
                    'button' => [
                        'text' => $product['button']['text'] ?? '',
                        'link' => $product['button']['link'] ?? '',
                    ],
                ];
            }),
            'readmore_title' => $this->readmore_title,
            'readmore_link' => $this->readmore_link,
            'specific_program' => $this->specific_program,
        ];
    }
}
