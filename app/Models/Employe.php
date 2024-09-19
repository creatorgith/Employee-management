<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Imports\EmployeImport;

class Employe extends Model
{
    use HasFactory;
    protected $tables='employes';
    protected $fillable=['user_id','employe_id','firstname','lastname','email','password','address','joiningdate','gender','profilephoto'];

    public function getFullNameAttribute()
    {
    //     dd($this->firstname.$this->lastname);
        return "{$this->firstname}{$this->lastname}";
    }
    public function getdatesAttribute()
    {
        // dd($this->joiningdate);
   $formatdate=     ( \Carbon\Carbon::createFromFormat('Y-m-d', $this->joiningdate)->format('d-m-Y') );
   return $formatdate;
    }

    public function salary(){
        return $this->hasMany(Salary::class,'employe_id');
    
    }

    public function ScopeGetId($query,$id){
        return $query->where('id',$id);
    }

    public function skills(){
        return $this->hasOne(Employeskills::class,'employe_id');
    }
}