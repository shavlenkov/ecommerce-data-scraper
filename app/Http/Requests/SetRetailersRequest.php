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
    /**
     * @OA\Schema(
     *     schema="SetRetailersRequest",
     *     type="object",
     *     required={"retailer_ids"},
     *     @OA\Property(
     *         property="retailer_ids",
     *         type="array",
     *         items=@OA\Items(type="integer", example=1),
     *         minItems=1,
     *         description="An array of retailer IDs"
     *     )
     * )
     */
    public function rules(): array
    {
        return [
            'retailer_ids' => 'required|array|min:1',
            'retailer_ids.*' => 'integer|distinct',
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
            'retailer_ids.required' => 'The retailer IDs are required.',
            'retailer_ids.array' => 'The retailer IDs must be an array.',
            'retailer_ids.min' => 'At least one retailer ID is required.',
            'retailer_ids.*.integer' => 'Each retailer ID must be an integer.',
            'retailer_ids.*.distinct' => 'Retailer IDs must be distinct.',
        ];
    }
}
