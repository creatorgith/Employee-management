<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lives extends Model
{
    use HasFactory;
    protected $tables='lives';
    protected $fillable=['firstname','lastname','email','password','address','joiningdate','gender','profilephoto','country_id','state_id'];

    public function getFullNameAttribute()
    {
    //     dd($this->firstname.$this->lastname);
        return "{$this->firstname}{$this->lastname}";
    }
}
