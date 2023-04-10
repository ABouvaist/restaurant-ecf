<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantMenu extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
    ];

    public function menuFormulas(): HasMany
    {
        return $this->hasMany(MenuFormula::class);
    }
}
