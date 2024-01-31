<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageValidationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => 'required|file|mimes:jpeg,jpg,png,JPG,svg|max:10048',
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'Food Image need to be provided.',
            'file.file'     => 'Food Image must be an image.',
            'file.mimes'    => 'Food Image must be a file of type: jpeg, jpg, png, svg.',
            'file.max'      => 'Food Image may not be greater than 2048 kilobytes.',
        ];
    }
}
