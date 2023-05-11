<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Dish */
class DishResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
/*            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,*/

            'restaurant_dish_id' => $this->restaurant_carte_id,
            'dish_category_id' => $this->dish_category_id,

            'category' => new DishCategoryResource($this->whenLoaded('category')),
            'dishCategory' => new DishCategoryResource($this->whenLoaded('dishCategory')),
        ];
    }
}
