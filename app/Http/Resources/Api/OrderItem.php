<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,         
            'quantity' => $this->quantity,
            'sale_price' => $this->sale_price,
            'total'=> $this->total,
            'tax'=> $this->tax,
            'net'=> $this->net,
        ];
    }
}
