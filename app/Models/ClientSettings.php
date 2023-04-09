<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientSettings extends Model
{
    protected $casts = [
        'allergies' => 'array',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
