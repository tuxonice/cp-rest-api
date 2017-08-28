<?php

use Illuminate\Database\Seeder;

class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cFile = storage_path().'/municipalities.txt';
        if (($handle = fopen($cFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $this->data['municipality_id'] = (int)$data[1];
                $this->data['district_id'] = (int)$data[0];
                $this->data['name'] = $data[2];
                
                DB::table('municipalities')->insert($this->data);
            }   
        fclose($handle);
        }
    }
}
