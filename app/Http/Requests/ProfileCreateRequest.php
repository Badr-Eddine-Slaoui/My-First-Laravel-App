<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileCreateRequest extends FormRequest
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
            "username"=> [
                "required",
                "string",
                "between:3,30",
                Rule::unique("profiles","username")->where("deleted_at",null),
            ],
            "email"=> [
                "required",
                "string",
                "max:150",
                Rule::unique("profiles","email")->where("deleted_at",null),
            ],
            "password"=> [
                "required",
                "string",
                "between:8,16",
                "confirmed"
            ],
            "age"=> [
                "required",
                "numeric",
            ],
            "image"=> [
                "image",
                "mimes:png,jpg,jpeg,svg",
                "max:10250"
            ],
        ];
    }
}
