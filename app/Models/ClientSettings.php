<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientSettings extends Model
{
    protected $casts = [
        'allergies' => 'array',
    ];
}
