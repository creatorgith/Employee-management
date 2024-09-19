<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lives;

class LivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lives::truncate();
        $csvData = fopen(base_path('database/csv/Lives.csv'), 'r'); 
// dd($csvData)
        if ($csvData) {
            $transraw = true; 
            
            while (($data = fgetcsv($csvData, 555, ',')) !== false) {
                // dd($data);
                if ($transraw) {
                    Lives::create([
                        'firstname' => $data[0],
                        'lastname' => $data[1],
                        'email' => $data[2],
                        'password' => $data[3], 
                        'address' => $data[4],

                    ]);
                    // dd('bye');
                } else {
                    // dd('hi');
                    $transraw = false; 
                }
            }

            fclose($csvData); 
        } else {

            $this->command->info("Error opening CSV file.");
        }
}
}
