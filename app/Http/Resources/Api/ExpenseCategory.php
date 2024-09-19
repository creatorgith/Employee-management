<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseCategory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $status=$this->getStatus($this);               
        return [  
             'id' => $this->id,         
             'name' => $this->name,
             'status' => $status,
        
               
         ];    }
}
