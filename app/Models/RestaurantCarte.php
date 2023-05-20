<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class RestaurantCarte extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'shown',
    ];

    protected $casts = [
        'shown' => 'boolean',
    ];

    //default values
    protected $attributes = [
        'shown' => false,
    ];

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    public function toggleDisplay(): void
    {
        $other = self::whereShown(true)->first();
        $other?->hide();
        $this->show();
    }

    public function hide(): void
    {
        $this->shown = false;
        $this->save();
    }

    public function show(): void
    {
        $this->shown = true;
        $this->save();
    }

    public function categories(): HasManyThrough
    {
        return $this->hasManyThrough(DishCategory::class, Dish::class, 'restaurant_carte_id', 'id', 'id', 'dish_category_id');
    }

    public function uniqueCategories(): HasManyThrough
    {
        return $this->categories()->distinct();
    }

    public function scopeShown(Builder $query): Builder
    {
        return $query->where('shown', true);
    }
}
