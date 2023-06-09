<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function dishCategory(): BelongsTo
    {
        return $this->belongsTo(DishCategory::class);
    }

    public function category(): BelongsTo
    {
        return $this->dishCategory();
    }

    public function restaurantCarte(): BelongsTo
    {
        return $this->belongsTo(RestaurantCarte::class);
    }

    public function carte(): BelongsTo
    {
        return $this->restaurantCarte();
    }
}
