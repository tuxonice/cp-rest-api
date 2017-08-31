<?php

use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dFile = storage_path().'/districts.txt';
        if (($handle = fopen($dFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $this->data['district_id'] = (int)$data[0];
                $this->data['name'] = $data[1];
                
                DB::table('districts')->insert($this->data);        
            }   
        fclose($handle);
        }
    }
}
