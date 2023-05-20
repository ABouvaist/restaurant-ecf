<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientSettings extends Model
{
    protected $fillable = [
        'allergies',
        'number_of_guests',
    ];

    protected $casts = [
        'allergies' => 'array',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
