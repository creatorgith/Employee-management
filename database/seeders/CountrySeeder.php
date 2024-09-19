<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Countries;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Countries::insert([
            'name'=>'AFGANISTAN',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'BRAZIL',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'CANADA',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'DOMINICA',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'EGYPT',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'FRANCE',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'GERMANY',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'HONGKONG',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'INDIA',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'JAPAN',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'KENYA',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'LIBERIA',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'MALDIVES',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'NEPAL',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'POLAND',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Countries::insert([
            'name'=>'QATAR',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'ROMANIO',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'SINGAPORE',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        Countries::insert([
            'name'=>'THAILLAND',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);




    }
}
