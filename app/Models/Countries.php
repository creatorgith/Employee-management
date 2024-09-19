<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $tables='countries';
    protected $fillable=['name','status'];
    
    public function states()
    {
        return $this->hasMany(States::class,'country_id','id');
    }

    public function scopeActive($query)
{
    
    return $query->where('status', 'active');
}

// Usage:

}
