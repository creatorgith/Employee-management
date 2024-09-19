<?php

namespace App\Imports;

use App\Models\Employe;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        // dd($row);
        if($row[0]!='')
        {
        return new Employe([
            'employee_id' => $row[0],
            'firstname' => $row[1],
            'lastname' => $row[2],
            'address' => $row[3],
            'joiningdate' => $row[4],
            'gender' => $row[5],
      
        ]);
    }
     

    }
}