<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product' => [
                'name' => $this->name,
                'short_description' => $this->short_description,
                'description' => $this->description,
                'price' => $this->price,
                'average_rating' => $this->average_rating,
                'category' => $this->category,
                'reviews' => $this->reviews
            ]
        ];
    }
}
