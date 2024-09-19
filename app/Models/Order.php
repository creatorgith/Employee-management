<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='orders';
    protected $fillable=['user_id',
        'customer_id',
        'order_number',
        'total',
        'discount',
        'tax',
        'net',
        'entry_by',
        'order_date',
        'payment_date',
        'status',
        'payment_status',
        'paymentgateway_id',
        // 'payment_mode',
        'approved_by',
        'transaction_id',
        'memo',
        'date',
        'tracking_id',
        'tracking_url',
        'shipping_address',
        'discount_percentage',
        'discount_flat',
        'via',
        'woocommerce_response',
        'sgst_tax',
        'cgst_tax',
        'igst_tax',
        'shipping_charge',
        'custom_discount'
    ];
    protected $dates=['order_date','date', 'payment_date','deleted_at'];

    // public function company(){
    //     return $this->belongsTo('App\Models\Company','company_id');
    // }
    //  public function branch(){
    //     return $this->belongsTo('App\Models\Branch','branch_id');
    // }
    public function orderitem(){
        return $this->hasMany('App\Models\OrderItem','order_id','id');
    }
     public function entryby(){
        return $this->belongsTo('App\Models\User','entry_by');
    }
     public function approved_by(){
        return $this->belongsTo('App\Models\User','approved_by');
    }
    public function location(){
        return $this->belongsTo('App\Models\Location','location_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function invoice(){
        return $this->hasMany('App\Models\OrderInvoice','order_id','id');
    }
    public function orderinvoice(){
        return $this->hasOne(OrderInvoice::class,'order_id','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function getGstAttribute(){
        if(!$this->igst_tax){
        $value=0;
        $value= $this->tax / 2;
        }
        else
        {
        // dd('i',$this->igst_tax);
            $value=$this->tax;
        }
        // dd($value); 
        return $value;
    }

    public function getTotalAmountAttribute(){
        $value=0;
        $value=$this->net + $this->tax;
        return round($value,2);
    }
    public function paymentgateway()
    {
        return $this->belongsTo(PaymentGateway::class,'paymentgateway_id');
    }
}
 