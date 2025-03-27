<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string',
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
            'email.required' => 'The email address is required.',
            'email.string' => 'The email address must be a string.',
            'password.required' => 'The password is required.',
            'password.string' => 'The password must be a string.',
        ];
    }
}
