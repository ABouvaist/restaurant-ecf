<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantDishes extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'shown',
    ];

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    public function display(): void
    {
        $other = self::whereShown(true)->first();
        $other?->hide();
        $this->shown = true;
        $this->save();
    }

    public function hide(): void
    {
        $this->shown = false;
        $this->save();
    }

    public function categories(): HasManyThrough
    {
        return $this->hasManyThrough(DishCategory::class, Dish::class, 'restaurant_dishes_id', 'id', 'id', 'dish_category_id');
    }

    public function uniqueCategories(): HasManyThrough
    {
        return $this->categories()->distinct();
    }
}
