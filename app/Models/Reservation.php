<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'allergies',
        'number_of_guests',
        'date',
        'time'
    ];

    protected $casts = [
        'allergies' => 'array',
        'date' => 'date',
        'time' => 'timestamp',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
