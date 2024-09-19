<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ExpenseCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='expense_category';
    protected $fillable=['scope','name','slug','status','is_return'];
    protected $dates=['deleted_at'];

     public function getStatus($expensecategory){
        $status='active';
        if($expensecategory->status==0)
        {
            $status='inactive';
        }
        return $status;
    }
    //     public function company()
    // {
    //     return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    // }
}
