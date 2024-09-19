<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\gender;

class EditEmployeeRequest extends FormRequest
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
            'firstname' => 'required|alpha|max:255',
            'lastname' => 'required|alpha|max:255',
            'email' => 'required|email',
           'password' => 'required|string|min:8',
            'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/', 
            'date'=>'required',
            'gender' =>  'required',new gender(),
            'photo' => 'max:5000|mimes:jpg,png,pdf',
        ];
    }


    public function message()
    {
        return [
            'firstname.required' => 'The name field is required.',
            'firstname.alpha' => 'The name field must be a string.',
            'firstname.max' => 'The name field must not exceed 255 characters.',
            'lastname.required' => 'The name field is required.',
            'lastname.alpha' => 'The name field must be a string.',
            'lastname.max' => 'The name field must not exceed 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password field must be a string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'address.required' => 'The address  is required.',
            'date.required' => 'The Joining date field is required.',
            'gender.required' => 'The gender is required',
            'photo.max' => 'file must be less than 5MB.',
            'photo.mimes'  => 'file must be JPG.',
        ]; 
    }
}
