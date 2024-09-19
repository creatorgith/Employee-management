<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skills;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skills::insert([
            'skills'=>'C',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Skills::insert([
            'skills'=>'C++',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Skills::insert([
            'skills'=>'Java',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Skills::insert([
            'skills'=>'Python',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Skills::insert([
            'skills'=>'PHP',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Skills::insert([
            'skills'=>'SQL ',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Skills::insert([
            'skills'=>'Cloud Computing',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Skills::insert([
            'skills'=>'Git and Github',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Skills::insert([
            'skills'=>'Cybersecurity',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);

        Skills::insert([
            'skills'=>'Problem Solving',
            'created_at'=>date("Y/m/d H:i:s"),
            'updated_at'=>date("Y/m/d H:i:s"),
        ]);
    }
}
