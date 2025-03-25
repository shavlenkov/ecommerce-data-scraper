<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateProductRequest extends FormRequest
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
            'description' => 'required|string|max:1000',
            'manufacturer_part_number' => 'required|string|unique:products,manufacturer_part_number',
            'pack_size_id' => 'required|integer|exists:pack_sizes,id',
            'product_url' => 'required|string|url',
            'retailer_id' => 'required|integer|exists:retailers,id',
            'images' => 'required|array|min:1',
            'images.*' => 'url|string',
        ];
    }
}
