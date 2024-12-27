<?php

namespace App\Http\Resources;

use App\Models\Category;
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
            'category_id' => $this->category,
            'name' =>$this->name,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H-i-s'),
            'updated_at' => $this->updated_at->format('Y-m-d H-i-s'),
        ];
    }
}
