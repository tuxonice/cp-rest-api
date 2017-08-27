<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Sunra\PhpSimple\HtmlDomParser;
use Illuminate\Support\Facades\DB;

class GpsCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'pixel:gps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import GPS coords.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        
        $gpsUrl = env('GPS_URL',null);
        if(is_null($gpsUrl)) {
            echo("GPS_URL not defined\n");
            return;
        }
        
        $results = app('db')->select("SELECT DISTINCT cp4, cp3 FROM ctt where district_id = 8 AND latitude IS NULL ORDER BY cp3;");
        
        $client = new \GuzzleHttp\Client();
        foreach($results as $result) {
            $url = sprintf($gpsUrl, $result->cp4, $result->cp3);
            $res = $client->request('GET', $url);
            $body = (string)$res->getBody();
            $dom = HtmlDomParser::str_get_html($body);
            $gps = $dom->find('span[class="pull-right gps"]',0)->innertext;
            if($gps) {
                $gps = trim(str_replace('<b>GPS:</b>','',$gps));
                $parts = explode(',',$gps);
                if(!is_array($parts) || count($parts) != 2){
                    continue;
                }
                list($lat, $long) = $parts; 
                $lat = floatval($lat);
                $long = floatval($long);
                DB::table('ctt')->where([
                    ['cp4', '=', $result->cp4],
                    ['cp3', '=', $result->cp3],
                        ])->update(['latitude' => $lat,'longitude' => $long]);
                echo($result->cp4.'-'.$result->cp3.' -> '.$lat.'/'.$long."\n");        
                
            } else {
                echo($result->cp4.'-'.$result->cp3." -> \n");
            }
        
            sleep(1);
            
        }
    }

}
