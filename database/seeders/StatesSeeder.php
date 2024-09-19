<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\States;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        States::insert([
            'country_id'=>9,
            'name'=>'TAMILNADU',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        States::insert([
            'country_id'=>9,
            'name'=>'KERALA',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        States::insert([
            'country_id'=>9,
            'name'=>'ANDHRA PRADESH',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
        States::insert([
            'country_id'=>9,
            'name'=>'KARNATAKA',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
    }
}
