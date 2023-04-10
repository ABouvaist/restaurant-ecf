<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DishCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }
}
