<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForumRequest extends FormRequest
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
            "topic" => "required|string",
            "description" => "required|string|max:150",
            "content" => "required|string",
        ];
    }

    public function messages(): array {
        return [
            "topic.required" => "Topic is required",
            "description.required" => "Description is required",
            "description.max" => "Description is too long",
            "content.required" => "Content is required",
        ];
    }
}
