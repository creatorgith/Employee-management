<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentprofile extends Model
{
    use HasFactory;
    protected $table='studentprofile';
    protected $fillable=['student_id','mobile_no','gender','file','country_id','state_id'];

    public function country()
    {
        return $this->belongsTo(Countries::class,'country_id');
    }

    public function states()
    {
        return $this->belongsTo(States::class,'state_id','id');
    }


    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
