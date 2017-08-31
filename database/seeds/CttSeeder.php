<?php

use Illuminate\Database\Seeder;

class CttSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
    public function run()
    {
        $cpFile = storage_path().'/cp.txt';
        $line = 0;
        $sData = [];
        $inserted = [];
        $cttBulkData = [];
        $locationsBulkData = [];
        $start = time();
        if (($handle = fopen($cpFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $line++;

                $sData['district_id'] = (int)$data[0];
                $sData['municipality_id'] = (int)$data[1];
                $sData['location_id'] = (int)$data[2];
                $sData['art_cod'] = $data[4];
                $sData['art_tipo'] = $data[5];
                $sData['pri_prep'] = $data[6];
                $sData['art_titulo'] = $data[7];
                $sData['seg_prep'] = $data[8];
                $sData['art_desig'] = $data[9];
                $sData['art_local'] = $data[10];
                $sData['troco'] = $data[11];
                $sData['porta'] = $data[12];
                $sData['cliente'] = $data[13];
                $sData['cp4'] = $data[14];
                $sData['cp3'] = $data[15];
                $sData['cpalf'] = $data[16];

                $bulkData[] = $sData;
                if(!in_array((int)$data[2], $inserted)) {
                    $lData = [];
                    $lData['name'] = $data[3];
                    $lData['district_id'] = (int)$data[0];
                    $lData['municipality_id'] = (int)$data[1];
                    $lData['location_id'] = (int)$data[2];
                    $locationsBulkData[] = $lData;
                    $inserted[] = (int)$data[2];
                }

                if(count($bulkData) >= 400){
                    DB::table('ctt')->insert($bulkData);
                    DB::table('locations')->insert($locationsBulkData);
                    $locationsBulkData = [];
                    $bulkData = [];
                }

                if(!($line % 100)) {
                    $diffTime = (time() - $start);
                    if($diffTime > 0){
                        $regPerSec = ceil($line / $diffTime);
                        echo("Line: $line -> $regPerSec Lines per sec\n");
                    } else {
                        echo("Line: $line\n");
                    }
                }
            }
            
         if(count($bulkData)){
            DB::table('ctt')->insert($bulkData); 
         }
         
         if(count($locationsBulkData)){
            DB::table('locations')->insert($locationsBulkData);
         }           
                    
        fclose($handle);
        }
    }
    
}
