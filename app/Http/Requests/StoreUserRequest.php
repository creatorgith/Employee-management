<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniquePhoneNumber;

class StoreUserRequest extends FormRequest
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

    public function rules()
    {
        return [
           'name' => 'required|alpha|max:255',
           'username' =>'required|alpha|max:255',
           'email' => 'required|email',
           'password' => 'required|string|min:8',
           'phno' => new UniquePhonenumber(),
           'gender' =>  'required',
           'file' => 'max:10000|mimes:jpg,png,pdf',
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
            'password.required' => 'The password field is required.',
            'password.string' => 'The password field must be a string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'phno.required' => 'The mobile is required',
            'phno.numeric'=>'Mobile.no must be digit ',
            'phno.return' => 'Mobile no is already taken by someone',
            'phno.digit' =>'Mobile.no will must be 10 digits',
            'gender.required'  =>'Gender field is  srequired.',
            'file.required'   => 'file is required.',
            'file.max' => 'file must be less than 10MB.',
            'file.mimes'  => 'file must be document.',
            'country.required'=>'Country is required',
            'states.required'=>'State is required'
        ]; 
    }
}
