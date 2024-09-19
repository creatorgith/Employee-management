<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\month;

class AddSalaryRequest extends FormRequest
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

        $id=$this->segment(3);
// dd($id);
        return [
            'month'=>['required',new month($id)],
            // 'date' => ['required', new UniqueDateForId($this->input('id'))],
            'salary'=>'required|numeric',
        ];
    }
    public function message()
    {
        return [
            'month.required'=>' The month field is required ',
            'salary.required'=>'The Salary field is required ',
            'salary.numeric'=>'salary must be a number',

            ]; 
    }
}
