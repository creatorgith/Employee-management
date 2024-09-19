<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Expense extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='expense';
    protected $fillable=['expense_category_id','expense_account_id','expense_date','amount','is_billable','is_taxable','is_paid','payment_date','payment_mode','entry_by','memo','location_id','paid_through','date','via'];
    protected $dates=['expense_date','date', 'payment_date'];

    public function expensecategory(){
        return $this->belongsTo('App\Models\ExpenseCategory','expense_category_id');
    }
     public function attachments(){
          return $this->hasMany('App\Models\Attachments','entity_id')->where('entity_name','App\Models\Expense');
     }

     public function getlatestattachment(){
          return $this->attachments()->orderby('id','desc')->first();
     }
     public function location(){
        return $this->belongsTo('App\Models\Location','location_id');
    }
    public function expenseaccount(){
        return $this->belongsTo('App\Models\ExpenseAccount','expense_account_id');
    }
    //   public function company(){
    //     return $this->belongsTo('App\Models\Company','company_id');
    // }
}
