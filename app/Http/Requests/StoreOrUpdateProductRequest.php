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
            'title' => 'required|max:255',
            'description' => 'required',
            'manufacturer_part_number' => 'required|unique:products,manufacturer_part_number',
            'pack_size_id' => 'required|exists:pack_sizes,id',
            'product_url' => 'required|url',
            'retailer_id' => 'required|exists:retailers,id',
            'images' => 'required|array|min:1',
            'images.*' => 'url',
        ];
    }
}
