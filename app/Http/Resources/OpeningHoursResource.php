<?php

namespace App\Http\Resources;

use App\Models\OpeningHours;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin OpeningHours */
class OpeningHoursResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'days' => [
                'monday' => $this->monday,
                'thursday' => $this->thursday,
                'wednesday' => $this->wednesday,
                'tuesday' => $this->tuesday,
                'friday' => $this->friday,
                'saturday' => $this->saturday,
                'sunday' => $this->sunday,
            ],
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
