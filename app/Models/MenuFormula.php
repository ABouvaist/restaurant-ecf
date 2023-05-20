<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuFormula extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function restaurantMenu(): BelongsTo
    {
        return $this->belongsTo(RestaurantMenu::class);
    }

    public function menu(): BelongsTo
    {
        return $this->restaurantMenu();
    }
}
