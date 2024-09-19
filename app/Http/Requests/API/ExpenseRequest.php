<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Auth;
use \Carbon\Carbon;
use App\Models\ExpenseCategory;

class ExpenseRequest extends FormRequest
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
        Validator::extend('checkpaymentmode', function ($attribute, $value, $parameters, $validator) 
        {
            $stockType = array("cash", "cheque", "upi", "bank","credit");
            if (in_array(request('payment_mode'), $stockType)) 
            {
                return TRUE;
            }
            return FALSE;
        });

        Validator::extend('checkpaymentdate', function ($attribute, $value, $parameters, $validator) 
        {
            if (request('payment_date') > Carbon::now()) 
            {
                return FALSE;
            }
            return TRUE;
        });

        Validator::extend('paymentmodeselection', function ($attribute, $value, $parameters, $validator) 
        {

            if ((request('paid_through') == 1 && request('payment_mode')==null) ||(request('paid_through') == 0 && request('payment_mode')!=null))
            {
                 return TRUE;
               
            }
            return FALSE;
        });
          Validator::extend('checkexpensedate', function ($attribute, $value, $parameters, $validator) 
        {
            if (request('expense_date') > Carbon::now()) 

            {
                return FALSE;
            }
            return TRUE;
        });
          Validator::extend('checkexpensecategory', function ($attribute, $value, $parameters, $validator) 
        {
            $expenseCategory = ExpenseCategory::where('id', request('expense_category_id'))->where('status',1)->exists(); 
            if ($expenseCategory)
            {
                return TRUE;
            }
            return FALSE; 
        });

        $rules['expense_category_id'] = ['bail','required','checkexpensecategory'];
        //,new CheckDaybookStatus(Auth::user(),$this->date),new CompanyStatus(Auth::user()), new CheckExpenseCategoryExist(Auth::user())
        $rules['amount'] = ['bail','required','numeric'];
     
      //  $rules['expense_date'] = ['nullable', 'checkexpensedate'];
        $rules['expense_date'] = ['required','checkexpensedate'];
       $rules['payment_date'] = ['nullable', 'checkpaymentdate'];
       $rules ['is_paid'] =['required', 'integer', 'in:0,1'];
        
        $rules['image'] = ['required','mimes:png,jpg,jpeg,pdf'];
        $rules['payment_mode'] = ['bail','required','checkpaymentmode'];
        return $rules;
    }
    private function normalizeDate($date)
    {
        $formats = ['Y-m-d', 'd/m/Y', 'm/d/Y', 'd-m-Y', 'm-d-Y'];
    
        foreach ($formats as $format) {
            try {
                $parsedDate = Carbon::createFromFormat($format, $date);
                if ($parsedDate && $parsedDate->format($format) === $date) {
                    return $parsedDate->format('Y-m-d');
                }
            } catch (\Exception $e) {
                // Continue to the next format if the current one fails
                continue;
            }
        }
    
        return $date; // Return the original date if no format matches
    }


    protected function passedValidation()
    {
        $this->merge([
            'expense_date' => $this->normalizeDate($this->expense_date),
            'payment_date' => $this->normalizeDate($this->payment_date),
        ]);
    }
    /**
     * Check if the date is valid for any of the specified formats.
     */
    private function isValidDate($date)
    {
        $formats = ['Y-m-d', 'd/m/Y', 'm/d/Y', 'd-m-Y', 'm-d-Y'];
        foreach ($formats as $format) {
            if (Carbon::createFromFormat($format, $date) !== false) {
                return true;
            }
        }
        return false;
    }
    public function messages()
    {
        $messages = [
            'expense_category_id.checkexpensecategory' => 'Given id is invalid',
            'payment_mode.checkpaymentmode' => 'paymentmode is not acceptable', 
            'payment_date.checkpaymentdate' => 'payment date is must be today or less than today',
            'payment_mode.paymentmodeselection' => 'Paid must be  0 or 1',
            'expense_date.checkexpensedate' =>' Expense date is must be today or less than today',
        ];

        return $messages;
    }
}
