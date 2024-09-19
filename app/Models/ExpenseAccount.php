<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ExpenseAccount extends Model
{
    use HasFactory;
    use SoftDeletes;
      protected $table='expense_account';
    protected $fillable=['expense_category_id','entity_id','entity_name','scope'];

    public function expenses(){
      return $this->hasMany('App\Models\Expense','expense_category_id');

    }
}
