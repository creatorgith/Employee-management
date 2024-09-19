<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Employe;

class gender implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
    //  dd($value);
    if(!empty($value)){
     $gender=["male","female"];

    //  $i=(in_array($value,$gender)){
    //     // return true;
    //     // dd('hi');
    //  }}
     if($i==true){}
    }
}}
