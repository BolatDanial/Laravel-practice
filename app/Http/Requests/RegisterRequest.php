<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "email" => "required|string|email|unique:users",
            "password" => "required|string|min:6",
            "repeat-password" => "same:password",
        ];
    }

    public function messages(): array {
        return [
            "name.required" => "Name is required",
            "email.required" => "Email is required",
            "email.email" => "Invalid email",
            "email.unique" => "Email already exists",
            "password.required" => "Password is required",
            "repeat-password.same" => "The passwords do not match."
        ];
    }
}
