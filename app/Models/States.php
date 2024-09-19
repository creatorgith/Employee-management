<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;
    protected $tables='states';
    protected $fillable=['country_id','name'];


    public function country()
    {
        return $this->belongsTo(Countries::class,'country_id','id');
    }
}
