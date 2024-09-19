<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $tables='students';
    protected $fillable=['name','username','email','password'];
    // protected $with='studentprofile';

    

    public function studentprofile(){
        return $this->hasOne(Studentprofile::class,'student_id');
    }
}
