<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(DishCategory::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(RestaurantDishes::class);
    }
}
