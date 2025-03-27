<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateRetailerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'url' => 'required|string|url',
            'currency' => 'required|string',
            'logo' => 'required|string|url',
        ];
    }

    /**
     * Get the custom validation messages for the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The retailer title is required.',
            'title.string' => 'The retailer title must be a string.',
            'title.max' => 'The retailer title cannot exceed 255 characters.',
            'url.required' => 'The retailer URL is required.',
            'url.string' => 'The retailer URL must be a string.',
            'url.url' => 'The retailer URL must be a valid URL.',
            'currency.required' => 'The retailer currency is required.',
            'currency.string' => 'The retailer currency must be a string.',
            'logo.required' => 'The retailer logo is required.',
            'logo.string' => 'The retailer logo must be a string.',
            'logo.url' => 'The retailer logo must be a valid URL.',
        ];
    }
}
