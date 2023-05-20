<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'allergies' => ['nullable', 'array'],
            'allergies.*' => ['nullable', 'string'],
            'number_of_guests' => ['required', 'integer', 'min:1'],
            'day' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'date_format:H:i'],
        ];
    }
}
