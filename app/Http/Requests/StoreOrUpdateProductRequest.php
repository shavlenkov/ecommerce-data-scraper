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

    /**
     * Get the custom validation messages for the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The product title is required.',
            'title.string' => 'The product title must be a string.',
            'title.max' => 'The product title cannot exceed 255 characters.',
            'description.required' => 'The product description is required.',
            'description.string' => 'The product description must be a string.',
            'description.max' => 'The product description cannot exceed 1000 characters.',
            'manufacturer_part_number.required' => 'The manufacturer part number is required.',
            'manufacturer_part_number.string' => 'The manufacturer part number must be a string.',
            'manufacturer_part_number.unique' => 'This manufacturer part number has already been taken.',
            'pack_size_id.required' => 'The pack size ID is required.',
            'pack_size_id.integer' => 'The pack size ID must be an integer.',
            'pack_size_id.exists' => 'The selected pack size ID is invalid.',
            'product_url.required' => 'The product URL is required.',
            'product_url.string' => 'The product URL must be a string.',
            'product_url.url' => 'The product URL must be a valid URL.',
            'retailer_id.required' => 'The retailer ID is required.',
            'retailer_id.integer' => 'The retailer ID must be an integer.',
            'retailer_id.exists' => 'The selected retailer ID is invalid.',
            'images.required' => 'At least one image is required.',
            'images.array' => 'The images must be an array.',
            'images.min' => 'At least one image URL is required.',
            'images.*.url' => 'Each image must be a valid URL.',
            'images.*.string' => 'Each image must be a valid string.',
        ];
    }
}
