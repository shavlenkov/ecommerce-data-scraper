<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    /**
     * @OA\Schema(
     *     schema="StoreOrUpdateUserRequest",
     *     type="object",
     *     required={"name", "email", "password", "role_id"},
     *     @OA\Property(property="name", type="string", example="John Doe"),
     *     @OA\Property(property="email", type="string", format="email", example="johndoe@example.com"),
     *     @OA\Property(property="password", type="string", example="password123"),
     *     @OA\Property(property="role_id", type="integer", example=1)
     * )
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users|email:rfc,dns',
            'password' => 'required|string',
            'role_id' => 'required|integer',
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
            'name.required' => 'The user name is required.',
            'name.string' => 'The user name must be a string.',
            'name.max' => 'The user name cannot exceed 255 characters.',
            'email.required' => 'The email address is required.',
            'email.string' => 'The email address must be a string.',
            'email.unique' => 'This email address is already taken.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password is required.',
            'password.string' => 'The password must be a string.',
            'role_id.required' => 'The role ID is required.',
            'role_id.integer' => 'The role ID must be an integer.',
        ];
    }
}
