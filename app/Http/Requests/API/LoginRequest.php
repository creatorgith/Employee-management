<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Hash;
class LoginRequest extends FormRequest
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
        $this->user = User::where('email', request('email'))->first();

       
        Validator::extend('check_user', function ($attribute, $value, $parameters, $validator) 
        { 
            if(is_null($this->user))
            {       
                return false;
            }
            return true; 
        });

        Validator::extend('check_password', function ($attribute, $value, $parameters, $validator) 
        { 
            if ($this->user!=null) 
            {
                if (Hash::check(request('password'), $this->user->password)) 
                {
                    return true;
                }
                return false;
            }
        });

        $rules =
        [
            'email'     => 'bail|required|email|check_user',
            'password'  => 'required|check_password',
            //'device_id' =>'required|check_device_id',
            
        ];

        return $rules;
    }
    public function messages()
    {
        $messages =
        [
            'email.check_user'          =>  'User doesnot exist',
            'email.check_password'      =>  'Incorrect Password',
        ];

        return $messages;
    }
}
