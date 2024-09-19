<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Studentprofile;

class UniquePhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // dd($value);
        $var= Studentprofile::where('mobile_no', $value)->exists();
        // dd($var);
        if($var=='true')
        $fail('The :attribute is already taken.');
    }
}
