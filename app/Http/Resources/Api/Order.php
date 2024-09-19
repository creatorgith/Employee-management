<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\OrderItem as OrderItemResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'=>$this->id,
            'customer_name'=>optional($this->customer)->name,
            'order_number'=>$this->order_number,
            'order_date'=>$this->order_date,
            'status'=>$this->status,
            // 'order_items' => OrderItemResource::collection($this->orderitem),
        ];
    }
}
