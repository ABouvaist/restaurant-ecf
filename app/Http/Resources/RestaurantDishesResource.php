<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\RestaurantDishes */
class RestaurantDishesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shown' => $this->shown,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'categories_count' => $this->categories_count,
            'dishes_count' => $this->dishes_count,
            'unique_categories_count' => $this->unique_categories_count,

            'categories' => DishCategoryResource::collection($this->whenLoaded('categories')),
            'dishes' => DishResource::collection($this->whenLoaded('dishes')),
            'uniqueCategories' => DishCategoryResource::collection($this->whenLoaded('uniqueCategories')),
        ];
    }
}
