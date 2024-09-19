<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mail\Admin\SendCustomerBirthdayWish;
use App\Helpers\FileHelper;
use App\Traits\WhatsAppProcess;
use App\Models\WhatsAppHistory;
use Carbon\Carbon;
use Exception;
use Log;
use Mail;
use DB;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='customers';
    protected $fillable=['name', 'email', 'dob','lastname','customer_id','status','image','gst_number','company_name']; //'firstname'

    public function address()
    {
        return $this->hasOne(Address::class,'entity_id')->where('entity_type',get_class($this));
    }
    public function getAddress()
    {
        // dd($this->address);
        $address=[
            'id' => $this->id,
            'gst_number' => $this->gst_number,
            'name'=>$this->name,
            'phone_no'=>optional($this->address)->phone_no,
            'country' =>optional($this->address->country)->name,
            'state' => optional($this->address->state)->name,
            'address' => optional($this->address)->address,
            'entity_id' => $this->id,
            'entity_type' => get_class($this),
            'city' => optional($this->address)->city,
            'dob' => optional($this->address)->dob,
            'pincode' => optional($this->address)->pincode,
            'email' => $this->email,
          ];

        return $address;  

    }
    public function getPath($file)
    {
        if($file!=null)
        {
            return FileHelper::getFilePath(NULL,$file);
        }
        else{
            return NULL;
        }

    }

    public function getFullNameAttribute()
    {
    //     dd($this->firstname.$this->lastname);
        $name =optional($this)->name;
        $lastname=optional($this)->lastname;
        return "{$name}{$lastname}";
    }

    public function order(){
        return $this->hasMany(Order::class,'customer_id');   
    }
    public static function SendBirthdayWish($customer,$content,$type)
    {

        if($customer->email!=null)
        {
            if($type=='email' || $type=='both')
            {
                Mail::to($customer->email)->queue(new SendCustomerBirthdayWish($customer,$content));

            }

        }
        if(optional($customer->address)->phone_no!=null)
        {
            if($type=='whatsapp' || $type=='both')
            {
                if(optional($customer->address)->country)
                  {
                    $mobile_number=optional($customer->address->country)->tel_prefix.optional($customer->address)->phone_no;
                  }
                  else{
                    $mobile_number='91'.optional($customer->address)->phone_no;
                  }

                $array=[
                    'name'=>$customer->name,
                    'mobile'=>$mobile_number,
                    'message'=>$customer->getFullNameAttribute().' '.$content,
                    'template'=>env('WHATSAPP_BIRTHDAY_WISH_TEMPLATE'),
                    'language_code'=>env('WHATSAPP_LANGUAGE_CODE')
                ];
               // dd($array);
                $res=WhatsAppProcess::sendBirthdayWishes($array);
                if($res!=null)
                {
                  $whatsapp_history=WhatsAppHistory::AddHistory($customer,$res,$mobile_number,'customer');
                }
            }
        }

    }
    public function favproduct()
    {
        $data=$this->order()
    ->join('order_items', 'orders.id', '=', 'order_items.order_id')
    ->join('products', 'order_items.product_id', '=', 'products.id')
    ->select('products.id', 'products.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
    ->groupBy('products.id', 'products.name')
    ->orderBy('total_quantity', 'desc')
    ->first();

        return optional($data)->name;
    }
}
