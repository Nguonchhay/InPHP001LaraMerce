<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'owner_id' => $this->owner_id,
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => asset($this->image_url),
            'unit_price' => $this->unit_price,
            'qty_in_stock' => $this->qty_in_stock
        ];
    }
}
