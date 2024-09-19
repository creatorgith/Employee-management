<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='order_items';
    protected $fillable=['order_id','location_id','product_id','quantity','sale_price','total','tax','net','available_quantity','status','payment_status','discount_percentage','discount_flat','total_discount','billing_address','product_data','sgst_tax','cgst_tax','igst_tax']; //'discount'

      public function order(){
        return $this->belongsTo('App\Models\Order','order_id');
    }

      public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
