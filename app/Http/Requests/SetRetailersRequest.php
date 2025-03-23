<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetRetailersRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'retailer_ids' => [
                'required',
                'array',
                'min:1',
            ],
            'retailer_ids.*' => [
                'integer',
                'distinct',
            ],
        ];
    }
}
