<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'skills' => [
                'required',
                'array',
                'min:3', // Ensure at least 3 skills are selected

            ],

        ];

    }
    public function message()
    {
        return [
            'skills.required' => 'Please select at least one skill.',
            'skills.array' => 'The skills must be an array.',
            'skills.min' => 'Please select exactly three skills.',
            'skills.*.exists' => 'One or more selected skills do not exist.',
        ];
}
}   