<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;
    protected $tables='live';
    protected $fillable=['firstname','lastname','email','password','address','joiningdate','gender','profilephoto','country','state'];

    public function getFullNameAttribute()
    {
    //     dd($this->firstname.$this->lastname);
        return "{$this->firstname}{$this->lastname}";
    }
}
