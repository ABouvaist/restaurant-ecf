<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            /*'url' => ['required'],
            'shown' => ['required'],*/
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:16384'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.max' => 'A title must be less than 255 characters',
            'image.required' => 'An image is required',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max' => 'The image may not be greater than 2048 kilobytes',
        ];
    }
}
