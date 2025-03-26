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
}
