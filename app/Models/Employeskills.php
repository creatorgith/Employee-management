<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeskills extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='employeskills';
    protected $fillable=['employe_id','employeskills'];

    public function employe(){
        return $this->BelongsTo(Employe::class,'employe_id');
    }
    public function scopeGetId($query,$id){
        return $query->where('id',$id);
    }

    public function scopeGetEmployeId($query,$id){
        return $query->where('employe_id',$id);
    }
}
