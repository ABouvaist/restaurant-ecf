<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required_without:shown', 'string', 'max:255'],
            'shown' => ['required_without:title', 'boolean'],
        ];
    }
}
