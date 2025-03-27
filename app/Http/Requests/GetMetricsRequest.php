<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetMetricsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_ids' => 'array|min:1',
            'product_ids.*' => 'integer|distinct',
            'manufacturer_part_numbers' => 'array|min:1',
            'manufacturer_part_numbers.*' => 'integer|distinct',
            'retailer_ids' => 'array|min:1',
            'retailer_ids.*' => 'integer|distinct',
            'start_date' => 'date|nullable',
            'end_date' => 'date|nullable',
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
            'product_ids.array' => 'The product IDs must be an array.',
            'product_ids.min' => 'At least one product ID is required.',
            'product_ids.*.integer' => 'Each product ID must be an integer.',
            'product_ids.*.distinct' => 'Product IDs must be distinct.',
            'manufacturer_part_numbers.array' => 'The manufacturer part numbers must be an array.',
            'manufacturer_part_numbers.min' => 'At least one manufacturer part number is required.',
            'manufacturer_part_numbers.*.integer' => 'Each manufacturer part number must be an integer.',
            'manufacturer_part_numbers.*.distinct' => 'Manufacturer part numbers must be distinct.',
            'retailer_ids.array' => 'The retailer IDs must be an array.',
            'retailer_ids.min' => 'At least one retailer ID is required.',
            'retailer_ids.*.integer' => 'Each retailer ID must be an integer.',
            'retailer_ids.*.distinct' => 'Retailer IDs must be distinct.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.date' => 'The end date must be a valid date.',
            'start_date.nullable' => 'The start date can be empty.',
            'end_date.nullable' => 'The end date can be empty.',
        ];
    }
}
