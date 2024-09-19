<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStudentRequest extends FormRequest
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
     
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|alpha|max:255',
            'username' =>'required|alpha|max:255',
            'email' => 'required|email',
            'gender' =>  'required',
            'file'=> 'max:5000|mimes:jpg,png,pdf',
            'country'=>'required',
           'states'=>'required',
        ];
    }
    public function message()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.alpha' => 'The name field must be a string.',
            'name.max' => 'The name field must not exceed 255 characters.',
            'username.required' => 'The name field is required.',
            'username.alpha' => 'The name field must be a string.',
            'username.max' => 'The name field must not exceed 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'gender.required'  =>'Gender field is  required.',
            'file.max' => 'file must be less than 10MB.',
            'file.mimes'  => 'file must be document.',           
            'country.required'=>'Country is required',
            'states.required'=>'State is required'
        ];
    }
}
