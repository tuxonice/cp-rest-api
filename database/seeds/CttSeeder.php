<?php

use Illuminate\Database\Seeder;

class CttSeeder extends Seeder
{
    
    private $data = [];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
    public function run()
    {
        $cpFile = storage_path().'/cp.txt';
        $line = 0;
        if (($handle = fopen($cpFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $line++;
                $this->data['name'] = $data[3];
                $this->data['district_id'] = $data[0];
                $this->data['municipality_id'] = $data[1];
                $this->data['parish_id'] = $data[2];
                $this->data['art_cod'] = $data[4];
                $this->data['art_tipo'] = $data[5];
                $this->data['pri_prep'] = $data[6];
                $this->data['art_titulo'] = $data[7];
                $this->data['seg_prep'] = $data[8];
                $this->data['art_desig'] = $data[9];
                $this->data['art_local'] = $data[10];
                $this->data['troco'] = $data[11];
                $this->data['porta'] = $data[12];
                $this->data['cliente'] = $data[13];
                $this->data['cp4'] = $data[14];
                $this->data['cp3'] = $data[15];
                $this->data['cpalf'] = $data[16];
                
                DB::table('ctt')->insert($this->data);        
                if(!($line % 50)) {
                    echo("Line: $line\n");
                }
            }   
        fclose($handle);
        }
    }
    
}
