<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Salary;

class Month implements Rule
{
    /**
     * The ID to check against.
     *
     * @var mixed
     */
    protected $id;

    /**
     * Create a new rule instance.
     *
     * @param  mixed  $id
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Implement your validation logic here
        // For example, check if the month is unique for the given ID
        // dd($value);
        $salary = Salary::where('month', $value)->where('employe_id',$this->id)->first();
        // dd($salary);
        return !$salary; // Return true if no salary record found for the given ID and month
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This employe is already got salary on this month .';
    }
}
