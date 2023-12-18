<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
            "title"=> [
                "required",
                "string",
                "between:3,150"
            ],
            "description"=>[
                Rule::requiredIf(!$this->hasFile("image")),
                "nullable",
                "string",
                "between:0,1000"
            ],
            "image"=>[
                Rule::requiredIf($this->isNotFilled("description")),
                "nullable",
                "image",
                "mimes:png,jpg,svg,jpeg",
                "max:10250"
            ]
        ];
    }
    public function messages(): array
    {
        return [
            "description.required"=> "The description field is required or add an image",
            "image.required"=> "The image field is required or add an description",
        ] ;
    }
}
