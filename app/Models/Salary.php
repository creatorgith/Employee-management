<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table='salary';
    protected $fillable=['employe_id','month','salary'];

    public function employe(){
        return $this->BelongsTo(Employe::class,'employe_id');

    }

    public function getdatemonAttribute()
    {
        $formatmon=( \Carbon\Carbon::createFromFormat('Y-m', $this->month)->format('M-Y') );
        //  dd($formatmon);
        return $formatmon;
    }
}
